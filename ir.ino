
const int ir1=13;
const int ir2=12;
const int ir3=2;
const int ir4=7;
const int ir5=4;
const int ir6=8;
//const int ir7=6;
int detection1=HIGH;
int detection2=HIGH;
int detection3=HIGH;
int detection4=HIGH;
int detection5=HIGH;
int detection6=HIGH;
//int detection7=HIGH;
void setup() 
  {
    Serial.begin(9600);

    
    pinMode(ir1,INPUT);
    pinMode(ir2,INPUT);
    pinMode(ir3,INPUT);
    pinMode(ir4,INPUT);
    pinMode(ir5,INPUT);
    pinMode(ir6,INPUT);
//    pinMode(ir7,INPUT);
  }
  
int count=0;
void loop() 
  {
    int arr[7]={0,0,0,0,0,0,0};
    detection1=digitalRead(ir1);
    detection2=digitalRead(ir2);
    detection3=digitalRead(ir3);
    detection4=digitalRead(ir4);
    detection5=digitalRead(ir5);
    detection6=digitalRead(ir6);
//    detection7=digitalRead(ir7);
    
    if(detection1==LOW)arr[0]=1;
    if(detection2==LOW)arr[1]=1;
//    if(detection3=LOW)
    arr[2]=1;
    if(detection4==LOW)arr[3]=1;
    if(detection5==LOW)arr[4]=1;
    if(detection6==LOW)arr[5]=1;
//    if(detection7==LOW)arr[6]=1;
    int i;
    for(i=0;i<7;i++) 
      Serial.print(arr[i]);
    Serial.println();
    
    Serial.flush();
    delay(500);
  }
