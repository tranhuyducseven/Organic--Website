#define _XTAL_FREQ 20000000

#define RS RD2
#define EN RD3
#define D4 RD4
#define D5 RD5
#define D6 RD6
#define D7 RD7

#include <xc.h>
#include "esp8266_functions.h"

#pragma config FOSC = HS        // Oscillator Selection bits (HS oscillator)
#pragma config WDTE = OFF       // Watchdog Timer Enable bit (WDT disabled)
#pragma config PWRTE = OFF       // Power-up Timer Enable bit (PWRT enabled)
#pragma config BOREN = ON       // Brown-out Reset Enable bit (BOR enabled)
#pragma config LVP = OFF        // Low-Voltage (Single-Supply) In-Circuit Serial Programming Enable bit (RB3 is digital I/O, HV on MCLR must be used for programming)
#pragma config CPD = OFF        // Data EEPROM Memory Code Protection bit (Data EEPROM code protection off)
#pragma config WRT = OFF        // Flash Program Memory Write Enable bits (Write protection off; all program memory may be written to by EECON control)
#pragma config CP = OFF         // Flash Program Memory Code Protection bit (Code protection off)

void sendEmaiFeature(unsigned char* ssid, unsigned char* pass, unsigned char* mail_ID, unsigned char* mail_Pas, unsigned char* send_ID, unsigned char* rec_ID){

    /*Put the module in AP+STA*/
    esp8266_mode(3);    
    __delay_ms(1500);  
    
    
    /*Connect to a AccesPoint*/
    esp8266_connect(ssid,pass); //Enter you WiFi name and password here    
    __delay_ms(1500);
    _esp8266_enale_MUX(); //Enable multiple connections
    _esp8266_create_server(); //Create a server on port 80
    _esp8266_connect_SMPT2GO(); //Establish TCP connection with SMPT2GO
    
    
    /*LOG IN with your SMPT2GO approved mail ID*/    
    _esp8266_login_mail(mail_ID,mail_Pas);
    __delay_ms(1500);
   
    /*End of Login*/
    
    
    _esp8266_mail_sendID(send_ID); //The sender mail ID
    _esp8266_mail_recID(rec_ID); //The Receiver mail ID    
    _esp8266_start_mail();
    _esp8266_mail_subject("Mail from ESP8266"); //Enter the subject of your mail
    _esp8266_mail_body("Warning!!!!!!!!!!"); //Enter the body of your mail       
    _esp8266_End_mail();
    _esp8266_disconnect_SMPT2GO();


}



void main()
{
    TRISD = 0x00;
    Initialize_ESP8266() ;     
    __delay_ms(1500);  
    sendEmaiFeature("wifi-host", "password", "YXN3aW50aGNkQGdtYWlsLmNvbQ==", "Y2lyY3VpdGRpZ2VzdA==", "sender@gmail.com","receiver@gmail.com");   
    
    
            
    while(1)
    {
        
    }

}