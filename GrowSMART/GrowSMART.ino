/***************************************************

  ALX Portfolio - SMART GREENHOUSE AUTOMATION
  BY: DERRICK LOCHA MAYIKU

  Based on the original sketches supplied with the ESP8266/Arduino

****************************************************/

// Libraries
#include <ESP8266WiFi.h>
#include "DHT.h"

// WiFi parameters
const char* ssid = "DerrickML";
const char* password = "1234567890";

// Pin
#define DHTPIN D3
const int ledPin = D2; // digital pin 5 
const int ldrPin = A0; // analog pin 0

// Use DHT11 sensor
#define DHTTYPE DHT22

// Initialize DHT sensor
DHT dht(DHTPIN, DHTTYPE);

// Host
const char* host = "192.168.137.1";

void setup() {

  // Start Serial
  Serial.begin(115200);
  delay(10);

  // Init DHT
  dht.begin();
  pinMode(ledPin, OUTPUT); // Here LED is determined as an output or an indicator.
  pinMode(ldrPin, INPUT); // Here LDR sensor is determined as input.

  // We start by connecting to a WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

//=======================================LOOP FUNCTION===================================================
void loop() {
  //---------------GETTING SENSOR READINGS---------------------------------------------------------------

  //Reading Light Sensor value
  int ldrStatus = analogRead(ldrPin);
  String lightState;
  if (ldrStatus <= 200) {digitalWrite(ledPin, HIGH); // If LDR senses darkness led pin high that means led will glow.
  Serial.print("Darkness over here,turn on the LED : ");
  Serial.println(ldrStatus);
  lightState = "ON";
  Serial.println("LightState: " + lightState);
  } else {
  digitalWrite(ledPin, LOW); // If LDR senses light led pin low that means led will stop glowing.
  Serial.print("There is sufficient light , turn off the LED : ");
  Serial.println(ldrStatus);
  lightState = "OFF";
  Serial.println("LightState: " + lightState);
  }
  //Reading Soil Moisture Sensor Value
  float moisture = random(0, 100);
  Serial.println("Moisture: "+String(moisture));
  // Reading temperature and humidity
  float h = dht.readHumidity();
  // Read temperature as Celsius
  float t = dht.readTemperature();
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print("%  Temperature: ");
  Serial.print(t);
  Serial.println("°C ");

  //--------------------------END OF GETTING SENSOR READINGS----------------------------------------------

  //--------------------------CONNECTING TO SERVER--------------------------------------------------------
  Serial.print("Connecting to ");
  Serial.println(host);

  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (client.connect(host, httpPort)) {
    // This will send the request to the server
    client.print(String("POST /Greenhouse/data_input.php?&Temperature=") + 
                              String(t) + "&moisture=" + String(moisture) +
                              "&Humidity=" + String(h) + 
                              "&LightIntensity=" + String(ldrStatus) +
                              "&BulbState=" + lightState +
                              "&WaterPump=ON" + 
                              "&Fan=ON" +
                 " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    delay(5000);
    // Read all the lines of the reply from server and print them to Serial
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }

    Serial.println();
    Serial.println("closing connection");
    return;
  }
  else {
    Serial.println("connection failed");
  }
  //---------------------------CLOSING CONNECTION TO SERVER---------------------------------------------

  // Repeat every 10 seconds
  delay(10000);

}
