#include <DHT.h>
#define DHTTYPE DHT11   // DHT 11

const int DHTPin = 5; // pin of dht sensor
DHT dht(DHTPin, DHTTYPE);

String response;

void setup() {
  Serial.begin(115200);
  dht.begin();
}

void loop() {
   // Wait a few seconds between measurements.
   delay(3000);
   // Reading temperature or humidity takes about 250 milliseconds!
   float h = dht.readHumidity();
   float t = dht.readTemperature();
   if (isnan(h) || isnan(t)) {
      Serial.print("0");
      return;
   }
   response = String(h,2) + ":" + String(t,2);
   Serial.println(response);
}
