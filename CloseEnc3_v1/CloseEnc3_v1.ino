    /*
    1st attempt at close enc organ using RGB LED
    */
     
    int redPin = 11;
    int greenPin = 10;
    int bluePin = 9;
    int usbnumber = 0; //this variable holds what we are currently reading from serial
     
    void setup()
    {
    pinMode(redPin, OUTPUT);
    pinMode(greenPin, OUTPUT);
    pinMode(bluePin, OUTPUT);
    Serial.begin(9600); //start up serial port;
    }
     
    void loop()
    {
     if (Serial.available() > 0) { //if there is anything on the serial port, read it
       usbnumber = Serial.read(); //store it in the usbnumber variable
    }
    
     if (usbnumber > 0) {
         switch(usbnumber){
                 case 49:  setColor(255, 0, 0); //red - D
                           tone(8,293);
                   break;
                 case 50:  setColor(255, 30, 0);//Orange - E
                           tone(8,329);
                   break;
                 case 51:  setColor(255, 0, 80); //Purple - C
                           tone(8,261);
                   break;
                 case 52:  setColor(255, 90, 0); //Yellow - C an octave lower
                           tone(8,130);
                   break;
                 case 53:  setColor(255, 255, 255); // White - G                           tone(8,196);
                   break;
                 case 54:  setColor(0, 0, 0); // off
                           noTone(8);
                   break;
               }
    }
    
   }
     
    void setColor(int red, int green, int blue)
    {
    analogWrite(redPin, red);
    analogWrite(greenPin, green);
    analogWrite(bluePin, blue);
    }
