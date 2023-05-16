"use strict";
/*  json data server 
    fetch(' PATH URL ')
    .then((response) => response.json())
    
    
    .then((json) => console.log(json));
*/ 

    
    
    
  
/* 
    a recursive function that goes through an index and concatenates the data in it. 
    and check if  subData exists if it exists, it will enter the function again if not moving to the next index
    
    new_text:  text
    arrayObjects: JSON objects
*/
function array_Objects(new_text,arrayObjects) 
{      
    for (var i = 0; i < arrayObjects.length; i++) 
    {      
        var ra_color  = "#" + Math.floor(Math.random()*16777215).toString(16);  // random color of background
        
        // concatenation json data
        new_text += '<div style=" background-color:' + ra_color + ';">id: ' + arrayObjects[i].id + "<br>site name: " + arrayObjects[i].name + '<br><a href="https://'+ arrayObjects[i].url +'/" target="_blank"target=_blank">site url: ' + arrayObjects[i].name + '</a>';
        
        if ('subData' in arrayObjects[i])  //  checking if subData key exists
        {    
            new_text += array_Objects(new_text,arrayObjects[i].subData);   
        } 
        new_text += '</div>';

    }  
    return new_text;
}
        
    
    
    
    
    
     
         
        
        
        
            
var JSON_Data = [
                {"id": "1","name": "google","url": "www.google.com","subData": 
                    [
                        {"id": "2","name": "walla","url": "www.walla.co.il"}, 
                        {"id": "3","name": "ynet","url": "www.ynet.co.il","subData": 
                            [
                                {"id": "4","name": "mako", "url": "www.mako.co.il"},
                                {"id": "5","name": "google","url": "www.google.com"},
                                {"id": "6","name": "walla","url": "www.walla.co.il"}
                            ]
                            
                        },
                        
                        {"id": "7","name": "google","url": "www.google.com"}
                    ]
                },
                
                {"id": "8","name": "ynet","url": "www.ynet.co.il","subData": 
                    [
                        {"id": "9","name": "walla","url": "www.walla.co.il"},
                        {"id": "10","name": "google","url": "www.google.com","subData": 
                            [
                                {"id": "11","name": "ynet","url": "www.ynet.co.il","subData": 
                                    [
                                        {"id": "12","name": "walla","url": "www.walla.co.il"},
                                        {"id": "13","name": "google","url": "www.google.com"},
                                        {"id": "14","name": "mako","url": "www.mako.co.il"}
                                    ]
                                },
                                
                                {"id": "15","name": "google","url": "www.google.com"},
                                {"id": "16","name": "mako","url": "www.mako.co.il"}
                            ]   
                        }, 
                        
                        {"id": "17","name": "walla","url": "www.walla.co.il","subData": 
                            [
                                {"id": "18","name": "ynet","url": "www.ynet.co.il"},
                                {"id": "19","name": "google","url": "www.google.com"},
                                {"id": "20","name": "walla","url": "www.walla.co.il"}
                            ] 
                        }, 
                        {"id": "21","name": "mako","url": "www.mako.co.il"}
                    ] 
                }
            ];
            

  
 
var text = "";

text = array_Objects(text,JSON_Data);
 
  
    
document.getElementById("myData").innerHTML = "<table><tr>" + text + "</tr></table>";

    

