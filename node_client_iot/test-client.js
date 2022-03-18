const request = require('request');
const { SerialPort } = require('serialport');
const { RegexParser } = require('@serialport/parser-regex')

const mainSerial = (data)=>{
  data = data.replace("\r", "");
  data = data.replace("\n", "");
  let dta = data.split(":");
  const h = parseFloat(dta[0]);
  const t = parseFloat(dta[1]);

    if (dta.length == 2) {
      console.log(h)
      console.log(t)
      request(`http://localhost/iot-1/phpServer/server/api.php?h=${h}&t=${t}`, (err, res, body) => {
        if (err) { return console.log(err); }
        console.log(body);
      });
    }
}

const port = new SerialPort({
  path: 'COM3',
  baudRate: 115200,
  autoOpen: false,
})

port.open(function (err) {
    if (err) {
      return console.log('Error: ', err.message)
    }
    
})

const parser = port.pipe(new RegexParser({ regex: /[\r\n]+/ }))
console.log('test termometer')
parser.on('data', function (data) {
    let resp = '';
    resp += data;
    console.log(new Date(), data)
    //mainSerial(resp)
})