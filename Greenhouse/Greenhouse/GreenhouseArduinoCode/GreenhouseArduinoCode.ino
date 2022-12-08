#include <SPI.h>
#include <Ethernet.h>
#include<SoftwareSerial.h>
#include "DHT.h"

SoftwareSerial mySerial(13, 12);

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //Setting MAC Address for Ethernet Shield

//----------------------ANALOG & DIGITAL PIN DEFINITIONS-----------------------------------------
#define MH A0                 //MOISTURE SENSOR
#define LDR A1                //LIGHT SENSOR
#define led1 2                 //LIGHTING   
#define led2 3               //LIGHTING
#define pump 5
#define fan 6
#define DHTPIN 7              //Digital pin connected to DHT Sensor
#define echoPin 8
#define trigPin 9

//------------------VARIABLE DEFINITION AND ASSIGNMENT-------------------------------------------------
int tankF = 100;                    /*Tank maximum content*/
int tankW = (tankF * (1 / 4));
int tankE = 0;

int LightIntensity = 0;
float moisture;
float Temperature;
float Humidity;

float maxTemp;
float maxHum;
float maxLight;
float maxMoist;

String message;

//------------------------------------------------------------------------------
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

char server[] = "192.168.43.137";
IPAddress ip(192, 168, 43, 138);
byte gateway[] = { 192, 168, 43, 1 };
byte subnet[] = { 255, 255, 255, 0 };
String readString;
EthernetClient client;

//-------------------------------------SETUP FUNCTION--------------------------------------------------
void setup() {
  //  mySerial.begin(9600);
  Serial.begin(9600);
  dht.begin();
  pinMode(echoPin, INPUT);
  pinMode(trigPin, OUTPUT);
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(fan, OUTPUT);
  pinMode(pump, OUTPUT);

  digitalWrite(pump, HIGH);
  digitalWrite(fan, HIGH);

  Serial.println("LOADING . . .");

  delay(500);

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    message = "Smart Greenhous: Failed to configure Ethernet using DHCP, Check connections";
    sendSMS();
    int c;
    for (c = 0; c < 10; c++) {
      digitalWrite(led2, HIGH); // set pin high
      delay(500);
      digitalWrite(led2, LOW);
      delay(500);
    }
    Ethernet.begin(mac, ip);
  }
  Serial.println("..................................Max/Min set values................................................");
  Getting_From_phpmyadmindatabase();
  delay(1000); //changed from 2000ms
  Serial.print("MaxTemp=");
  Serial.println(maxTemp);
  Serial.print("MaxHum=");
  Serial.println(maxHum);
  Serial.print("MaxLight=");
  Serial.println(maxLight);
  Serial.print("MaxMoist=");
  Serial.println(maxMoist);
  Serial.println("..................................End of MaxTemp/Min set values................................................");

  delay(1000); //changed from 2000ms
}

//--------------------------------------LOOP FUNCTION---------------------------------------------------
void loop() {

  LedControl();
  Humidity = dht.readHumidity();
  // Read temperature as Celsius (the default)
  Temperature = dht.readTemperature();
  // Read temperature as Fahrenheit (isFahrenheit = true)
  float f = dht.readTemperature(true);

  // Check if any readings failed and exit early (to try again).
  if (isnan(Humidity) || isnan(Temperature)) {
    Serial.println(F("Failed to read from DHT-11 sensor!"));
    message="Smart Greenhouse: Failed to read from the Temperature and Humidity Sensor. Please check for possible misconnections or errors";
    delay(30000);
    return;
  }

  LightIntensity = lux();

  float moist = analogRead(MH);
  moisture = ((moist / 1023) * 100);

  //  Get_From_phpmyadmindatabase();
  delay(1500); //changed from 3000ms
  Getting_From_phpmyadmindatabase();
  delay(1000);
  Sending_To_phpmyadmindatabase();

  LedControl();
  //  delay(500); // interval //changed from 10000ms
  delay(2000); //4min50sec
}

/*-------------------------------------------------------------------------------------------------------------------
  ---------------------------------------------------------------------------------------------------------------------
  ===========================================FUNCTIONS=================================================================
  ---------------------------------------------------------------------------------------------------------------------
  ---------------------------------------------------------------------------------------------------------------------*/

void Getting_From_phpmyadmindatabase()   //CONNECTING WITH MYSQL
{
  Serial.println();
  Serial.println("Send2");
  Serial.println();
  if (client.connect(server, 80)) {
    Serial.println("Getting_Data_connected");

    // Make a HTTP request
    client.println("GET https://localhost/Greenhouse/conditions.php");

    //    client.print("GET /Greenhouse/tempIn.php?");     //YOUR URL
    //    client.print("&Temperatur=");
    //    client.print(Temperature);
    client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
    client.println("Host: 192.168.43.138");
    client.println("Connection: close");
    client.println();
    updateSerial2();

    LedControl();

    int d;
    for (d = 0; d <= 2; d++) { //changed from 5 to 2
      LedControl();
      delay(1000);
    }
  }
  else {
    // if you didn't get a connection to the server:
    Serial.println("Getting_Data_connection failed");
    message = "Smart Greenhous: Failed to fetch data from database. Check internet connection.";
    sendSMS();
    digitalWrite(led2, HIGH);
  }
  LedControl();
  Serial.println();
  Serial.println();
}
//----------------------------------------------------------------------------------------------------------

void Sending_To_phpmyadmindatabase()   //CONNECTING WITH MYSQL
{
  if (client.connect(server, 80)) {
    Serial.println("Send_Data_connected");

    // Make a HTTP request
    client.print("GET /Greenhouse/data_input.php?");     //YOUR URL
    client.print("&moisture=");
    client.print(moisture);
    client.print("&LightIntensity=");
    client.print(LightIntensity);
    client.print("&Temperature=");
    client.print(Temperature);
    client.print("&Humidity=");
    client.print(10);
    //    client.print(Humidity);
    client.print("&light=");
    lightstate();
    client.print("&Fan=");
    fanState();
    client.print("&WaterPump=");
    pumpState();
    Serial.print("Moisture Levels = ");
    Serial.println(moisture);
    Serial.print(F("Humidity: "));
    Serial.print(Humidity);
    Serial.println("%");
    Serial.print(F("Temperature: "));
    Serial.print(Temperature);
    Serial.println(F("°C "));
    Serial.print("Light Intensity = ");
    Serial.println(LightIntensity);
    client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
    client.println("Host: 192.168.43.138");
    client.println("Connection: close");
    client.println();

    LedControl();

    int d;
    for (d = 0; d <= 2; d++) { //changed from 30 to 2
      LedControl();
      delay(1000);
    }
  }
  else {
    // if you didn't get a connection to the server:
    Serial.println("Send_Data_connection failed");
    message = "Smart Greenhous: Failed to send data from database. Check internet connection";
    sendSMS();
    digitalWrite(led2, HIGH);
  }
  LedControl();
}
//----------------------------------------LIGTH INTENSITY FUNCTION--------------------------------------------------------------
float lux() {
  /*
    RL = 500/lux
    VO = 5*(RL/(RL+R))
    VO = LDR_value*ADC_value
    LUX=(250/VO)-50
    Where;
    ...RL......... - Resistance of LDR
    ...R.......... - Resistance connected to LDR
    ...LDR_value.. - Analog value read by microcontroller pin
    ...ADC_value.. - system_voltage/Resolution of ADC
    ...VO......... - is the analog measured voltage
    ...lux........ - is illumination calculated
  */
  float intensity = 0.00, ADC_value = 0.004888, LDR_value = 0.00;
  LDR_value = analogRead(LDR);
  intensity = ((250 / (0.004888 * LDR_value)) - 50);
  return intensity;
}
//---------------------------------------------LIGHT STATE FUNCTION---------------------------------------------------------
void lightstate() {
  if (LightIntensity > maxLight) {
    digitalWrite(led1, HIGH);
    char light[] = "ON";
    client.print("ON");
    Serial.print("Light = ");
    Serial.println(light);
  }
  else if (LightIntensity <= 0) {
    digitalWrite(led1, HIGH);
    char light[] = "ON";
    client.print("ON");
    Serial.print("Light = ");
    Serial.println(light);
  }
  else {
    digitalWrite(led1, LOW);
    char light[] = "OFF";
    client.print("OFF");
    Serial.print("Light = ");
    Serial.println(light);
  }
}
//-------------------------------------------------------WATER PUMP STATE FUNCTION----------------------------------------------------------------------------
void pumpState() {
  if (moisture > maxMoist) {
    digitalWrite(pump, LOW);
    char water[] = "ON";
    client.print(water);
    Serial.print("Pump = ");
    Serial.println(water);
  }
  else {
    digitalWrite(pump, HIGH);
    char water[] = "OFF";
    client.print(water);
    Serial.print("Pump = ");
    Serial.println(water);
  }
}
//----------------------------------------------------------FAN STATE FUNCTION-------------------------------------------------------------------------
void fanState() {
  if (Temperature >= maxTemp) {
    digitalWrite(fan, LOW);
    Serial.println("Fan = ON");
    char Fan[] = "ON";
    client.print(Fan);
  }
  else {
    digitalWrite(fan, HIGH);
    Serial.println("Fan = OFF");
    char Fan[] = "OFF";
    client.print(Fan);
  }
  LedControl();
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------

////GSM FUNCTION FOR SENDING NOTIFICATION/MESSAGES TO CLIENT
void sendSMS()
{
  //.........................OPTION 1............................................................................
    mySerial.println("AT+CIPSHUT");
    updateSerial();
  
    delay(5000);
  
    mySerial.println("AT");
    updateSerial();
  
    mySerial.println("AT+CMGF=1");      // Set modem to text mode
    updateSerial();
  
    delay(1000);
  
    mySerial.write("AT+CMGS=");           // Start composing message
    updateSerial();
  
    mySerial.write(0x22);             // hex equivalent of double-quote '"'
  
    mySerial.write("+256776465777");           // the number to send the SMS to
    updateSerial();
  
    mySerial.write(0x22);
    mySerial.write(0x0D);              // hex equivalent of Carraige return
    mySerial.write(0x0A);                 // hex equivalent of newline
  
    delay(1000);
  
    mySerial.print("hello"); // Send the text message to the GSM module
    updateSerial();
  
    mySerial.write(0x0D);            // hex equivalent of Carraige return
    mySerial.write(0x0A);        // hex equivalent of newline
  
    delay(700);
  
    mySerial.write(26);            // equivalent of CTRL-Z
    delay(3000);
 //................OPTION 2.........................................................................
//  mySerial.println("AT");
//  delay(5000);
//  mySerial.println("AT+CMGF=1"); //Sets the GSM Module in message send mode
//  delay(1000);
//  //  mySerial.println("AT+CMGS=\"+256774546556\"\r");
//  mySerial.println("AT+CMGS=\"+256776465777\"\r");
//
//  delay(1000);
//  mySerial.println(message);
//  delay(100);
//  mySerial.println((char)26); //ASCII coode for CTRL+Z
//  delay(1000);

}

//SERIAL MONITOR UPDATE
void updateSerial()
{
  while (mySerial.available() != 0) /*If data is available on Serial port*/
    Serial.write(char(mySerial.read())); /*Print character received on to the Serial monitor*/
}


//.............................................................................................
float updateSerial2()
{
  Serial.println(".............................Max/Min Set Values.....................................");
  // Receive multiple numeric fields using Arduino 1.0 Stream parsing
  const int NUMBER_OF_FIELDS = 4; // how many comma-separated fields we expect
  int fieldIndex = 0; // the current field being received
  float values[NUMBER_OF_FIELDS]; // array holding values for all the fields
  if ( client.available()) {
    for (fieldIndex = 0; fieldIndex < 4; fieldIndex ++)
    {
      values[fieldIndex] = client.parseFloat(); // get a numeric value
    }
    Serial.print( fieldIndex);
    Serial.println(" fields received:");
    for (int i = 0; i < fieldIndex; i++)
    {
      Serial.println(values[i]);
    }
    maxMoist = values[0];
    maxLight = values[1];
    maxTemp = values[2];
    maxHum = values[3];
    fieldIndex = 0; // ready to start over
  }
  Serial.println(".............................Max/Min Value.....................................");
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
void LedControl() {}
