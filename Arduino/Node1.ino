#include <DHT.h>
#include <BH1750.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <SoftwareSerial.h>
//=================================config====================//
LiquidCrystal_I2C lcd(0x27, 16, 2);
const int DHTPIN = 4; // Noi chan DHT11 voi chan 4 cua arduino.
const int DHTTYPE = DHT11;
DHT dht(DHTPIN, DHTTYPE);
// Config cac cong cho cam bien do am dat.
int sensor_soil_mois_1 = A0;
int sensor_soil_mois_2 = A1;
int sensor_soil_mois_3 = A2;
// Config cho cam bien anh sang
BH1750 lightMeter;
int h, t, mois, lux, mois1, mois2, mois3;
int change_status = 0;
String string_index, status_7, status_8, status_9, status_10;

int t1, t2, h1, h2, l1, l2, m1, m2;
SoftwareSerial mySerial(2, 3); // RX, TX
String rain;
void setup()
{
  // put your setup code here, to run once:
  lcd.init();      // initialize the lcd
  lcd.backlight(); // open the backlight
  lcd.setCursor(4, 0);
  lcd.print("Vuon 1");
  //==========================
  Wire.begin();
  Serial.begin(9600);
  mySerial.begin(9600);
  lightMeter.begin();
  pinMode(sensor_soil_mois_1, INPUT);
  pinMode(sensor_soil_mois_2, INPUT);
  pinMode(sensor_soil_mois_3, INPUT);
  dht.begin();         // Khởi động cảm biến
  pinMode(10, OUTPUT); // dieu khien den.
  pinMode(9, OUTPUT);  // dieu khien phun suong.
  pinMode(8, OUTPUT);  // dieu khien may bom.
  pinMode(7, OUTPUT);  // dieu khien quat.
}
void tachchuoi(String chuoi);
void loop()
{
  // put your main code here, to run repeatedly:
  if (mySerial.available() > 0)
  {
    change_status = 1; // gia tri de nhan biet che do gi
    Serial.print("node1 receiving data");
    string_index = mySerial.readString();
    if (string_index.indexOf("node1") != -1)
    {
      rain = "0"; // dang khong mua
      int doc_cambien1 = analogRead(sensor_soil_mois_1);
      int doc_cambien2 = analogRead(sensor_soil_mois_2);
      int doc_cambien3 = analogRead(sensor_soil_mois_3);
      int phantram1 = map(doc_cambien1, 0, 1023, 1, 100);
      int phantram2 = map(doc_cambien2, 0, 1023, 1, 100);
      int phantram3 = map(doc_cambien3, 0, 1023, 1, 100);
      int phantramthuc1 = 100 - phantram1;
      int phantramthuc2 = 100 - phantram2;
      int phantramthuc3 = 100 - phantram3;
      mois1 = phantramthuc1;
      mois2 = phantramthuc2;
      mois3 = phantramthuc3;
      mois = (mois1 + mois2 + mois3) / 3;
      lux = lightMeter.readLightLevel();
      t = dht.readTemperature();
      h = dht.readHumidity();
      // Display on LCD
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("V1");
      lcd.setCursor(3, 0);
      lcd.print("T:");
      lcd.setCursor(5, 0);
      lcd.print(t);
      lcd.print("C");
      lcd.setCursor(9, 0);
      lcd.print("H:");
      lcd.setCursor(11, 0);
      lcd.print(h);
      lcd.print("%");
      lcd.setCursor(3, 1);
      lcd.print("M:");
      lcd.setCursor(5, 1);
      lcd.print(mois);
      lcd.print("%");
      lcd.setCursor(9, 1);
      lcd.print("L:");
      lcd.setCursor(11, 1);
      lcd.print(lux);
      lcd.print("L");
      // Send string data to Zigbee

      String data = status_10 + ";" + status_9 + ";" + status_8 + ";" + status_7 + ";" + rain + ";" + String(t) + ";" + String(h) + ";" + String(lux) + ";" + String(mois);
      // String data= status_10+";"+status_9+";"+status_8+";"+status_7+";"+String(t)+";"+String(h)+";"+String(lux)+";"+String (mois);
      Serial.print(data);
      mySerial.print(data);
    }
  };
  if (change_status == 1)
  {
    // change_status=0;
    if (string_index.indexOf("node1") != -1)
    {
      if (string_index.indexOf("auto1") != -1)
      {
        tachchuoi(string_index);
        // String receive form sever:
        // $den1.$ps1.$bom1.$rc1.'?'.$t1.';'.$h1.';'.$l1.';'.$m1;
        Serial.print(t1);
        Serial.print(m1);
        Serial.print(h1);
        Serial.print(l1);
        if (t > t1)
        {
          digitalWrite(7, 1); // bat quat
          status_7 = "1";
        }
        if (t <= t1)
        {
          digitalWrite(7, 0); // tat quat
          status_7 = "0";
        }
        if (h < h1)
        {
          digitalWrite(9, 1); // bat phun suong
          status_9 = "1";
        }
        if (h >= h1)
        {
          digitalWrite(9, 0); // tat phun suong
          status_9 = "0";
        }
        if (mois < m1)
        {
          digitalWrite(8, 1); // bat bom nuoc
          status_8 = "1";
        }
        if (mois >= m1)
        {
          digitalWrite(8, 0); // tat bom nuoc
          status_8 = "0";
        }
        if (lux < l1)
        {
          digitalWrite(10, 1); // bat den
          status_10 = "1";
        }
        if (lux >= l1)
        {
          digitalWrite(10, 0); // tat den
          status_10 = "0";
        }
      };
      if (string_index.indexOf("manual1") != -1)
      {
        if (string_index.indexOf("den1_on") != -1)
        {
          digitalWrite(10, 1);
          status_10 = "1";
        }
        if (string_index.indexOf("den1_off") != -1)
        {
          digitalWrite(10, 0);
          status_10 = "0";
        }
        if (string_index.indexOf("ps1_on") != -1)
        {
          digitalWrite(9, 1);
          status_9 = "1";
        }
        if (string_index.indexOf("ps1_off") != -1)
        {
          digitalWrite(9, 0);
          status_9 = "0";
        }
        if (string_index.indexOf("bom1_on") != -1)
        {
          digitalWrite(8, 1);
          status_8 = "1";
        }
        if (string_index.indexOf("bom1_off") != -1)
        {
          digitalWrite(8, 0);
          status_8 = "0";
        }
        if (string_index.indexOf("rc1_on") != -1)
        {
          digitalWrite(7, 1);
          status_7 = "1";
        }
        if (string_index.indexOf("rc1_off") != -1)
        {
          digitalWrite(7, 0);
          status_7 = "0";
        }
      }
    }
  }
}

void tachchuoi(String chuoi)
{
  String chuoi1;
  byte moc;
  for (int i = 0; i < chuoi.length(); i++)
    if (chuoi.charAt(i) == '?')
      moc = i; // Tìm v? trí c?a d?u ",

  chuoi.remove(0, moc + 1);

  for (int i = 0; i < chuoi.length(); i++)
    if (chuoi.charAt(i) == ',')
      moc = i; // Tìm v? trí c?a d?u ",
  chuoi.remove(moc);
  chuoi1 = chuoi;
  for (int i = 0; i < chuoi.length(); i++)
    if (chuoi.charAt(i) == ';')
      moc = i; // Tìm v? trí c?a d?u ",
  chuoi.remove(moc);
  chuoi1.remove(0, moc + 1);
  m1 = chuoi1.toInt();
  chuoi1 = chuoi;
  for (int i = 0; i < chuoi.length(); i++)
    if (chuoi.charAt(i) == ';')
      moc = i;
  chuoi.remove(moc);
  chuoi1.remove(0, moc + 1);
  l1 = chuoi1.toInt();
  chuoi1 = chuoi;
  for (int i = 0; i < chuoi.length(); i++)
    if (chuoi.charAt(i) == ';')
      moc = i;
  chuoi.remove(moc);
  chuoi1.remove(0, moc + 1);
  h1 = chuoi1.toInt();

  t1 = chuoi.toInt();
}
