const langs=[
"100 1000 0101 0101 0100 1111 0101 0100 0100 1001 0100 0001 0100 1110",
"HUO TIAN TECH IOT",
"100 1000 0101 0101 0100 1111 0101 0100 0100 1001 0100 0001 0100 1110",
"火天方案",
"中山火天智能科技有限公司",
"Zhongshan Huotian Intelligent Technology Co., Ltd.",
"100 1000 0101 0101 0100 1111 0101 0100 0100 1001 0100 0001 0100 1110",
"中山フオティエンインテリジェントテクノロジー株式会社",
"تشونغشان Huotian Intelligent Technology Co. ، Ltd.",
"ሆንንግሻን ሁዎቲያን ኢንተለጀንት ቴክኖሎጂ ኮ.",
"100 1000 0101 0101 0100 1111 0101 0100 0100 1001 0100 0001 0100 1110",
"Компания Чжуншань Хуотян Интеллектуальные Технологии Лтд.",
"중산 Huotian 지능형 기술 Co., Ltd.",
"Zhongshan Huotian बुद्धिमान प्रौद्योगिकी कं, लिमिटेड",
"100 1000 0101 0101 0100 1111 0101 0100 0100 1001 0100 0001 0100 1110",
];
let charSize=20;let fallRate=charSize/2;let streams;class Char{constructor(value,x,y,speed){this.value=value;this.x=x;this.y=y;this.speed=speed;}
draw(){const flick=random(100);if(flick<10){fill(120,30,100);text(round(random(9)),this.x,this.y);}else{text(this.value,this.x,this.y);}
this.y=this.y>height?0:this.y+this.speed;}}
class Stream{constructor(text,x){const y=random(text.length);const speed=random(2,10);this.chars=[];for(let i=text.length;i>=0;i--){this.chars.push(new Char(text[i],x,(y+text.length-i)*charSize,speed));}}
draw(){fill(120,100,100);this.chars.forEach((c,i)=>{const lit=random(100);if(lit<30){if(i===this.chars.length-1){fill(120,30,100);}else{fill(120,100,90);}}
c.draw();});}}
function createStreams(){for(let i=0;i<width;i+=charSize){streams.push(new Stream(random(langs),i));}}
function reset(){streams=[];createStreams();}
function setup(){createCanvas(innerWidth,innerHeight);reset();frameRate(20);colorMode(HSB);noStroke();textSize(charSize);textFont("monospace");background(0);}
function draw(){background(0,0.4);streams.forEach((s)=>s.draw());}
function windowResized(){resizeCanvas(innerWidth,innerHeight);background(0);reset();}