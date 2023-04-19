/*
 * HTTP Client POST Request
 * Copyright (c) 2018, circuits4you.com
 * All rights reserved.
 * https://circuits4you.com 
 * Connects to WiFi HotSpot. */

#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SoftwareSerial.h>
#include <Wire.h> 
// ZIGBEE=======================================//
SoftwareSerial datacontrol(14,12);   // RX, TX     
//===============================================//
/* Set these to your desired credentials. */
// const char *ssid = "Dan";  //ENTER YOUR WIFI SETTINGS
// const char *password ="20022002" ;
const char *ssid = "Toibidan";  //ENTER YOUR WIFI SETTINGS
const char *password ="20022002" ;
const char *host = "192.168.0.105";
const char *host1 = "http://192.168.43.44/EasyGame/servers/database/Getstatus.php";
const char *host2 = "http://192.168.43.44/EasyGame/servers/data/getData.php";
//const char *host3 = "http://192.168.43.44:81/demo/postdemo.php";
String datasend1,datasend2;
String postData1;
String postData2;
HTTPClient http;
WiFiClient wifi;
//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  delay(1000);
  Serial.begin(9600);
  datacontrol.begin(9600);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");
  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to Network/SSID");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  delay(1000);
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
// void tachchuoi1(String chuoi);
// void tachchuoi2(String chuoi);
void loop() {   //Declare object of class HTTPClient
   http.begin(wifi,host1);        // get STATUS
   http.addHeader("Content-Type", "application/x-www-form-urlencoded");
   int httpCode1=http.GET();
   String payload1=http.getString();
   while(httpCode1!=200)
   {
       httpCode1=http.GET();
   }
    Serial.println(httpCode1);
    Serial.println(payload1);
   // zigbee 
  datacontrol.print("node1"+payload1);            // Send Data den Node1
  while(datacontrol.available()<=0);              // cho nhan du lieu tu Node 1
  if(datacontrol.available()>0)
  {
      postData1 = datacontrol.readString();
      datasend1="datasend="+postData1;
  }  
  
  http.begin(wifi,host2);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode2=http.POST(datasend1);
  if(httpCode2==HTTP_CODE_OK)
  {
    String payload2 = http.getString();
    Serial.println(httpCode2);
    Serial.println(payload2);
  }
  else
  {
    Serial.println("HTTP POST request failed");
  }
  Serial.println(datasend1);
  Serial.println(httpCode2);
  while(httpCode2!=200)
  { 
        httpCode2=http.POST(datasend1);
  };
  http.end();
  delay(6000);  //Post Data at every 5 seconds


  // //Post Data
  // postData = "nhietdo=" + String(random(30,40)) + "&doam=" + String(random(60,90)) + "&anhsang=" + String(random(1,10));
  // Serial.println(postData);
  
  // http.begin("http://192.168.43.44:81/demo/postdemo.php");              //Specify request destination
  // http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  // int httpCode = http.POST(postData);   //Send the request
  // String payload = http.getString();    //Get the response payload

  // Serial.println(httpCode);   //Print HTTP return code
  // Serial.println(payload);    //Print request response payload

  // http.end();  //Close connection
  
  // delay(5000);  //Post Data at every 5 seconds
}
//=======================================================================

