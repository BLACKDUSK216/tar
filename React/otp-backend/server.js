const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const twilio = require('twilio');

const accountSid = 'AC7e3aa6d99652f594ba027eac28ad4440';
const authToken = '6c309a40fa42f6255f6052315a090f9d';
const twilioPhone = '+19382532647';

const client = twilio(accountSid, authToken);
const app = express();

app.use(bodyParser.json());
app.use(cors());

app.post('/send-otp', (req, res) => {
  const { phoneNumber } = req.body;

  const phoneNumberRegex = /^\+91[789]\d{9}$/; 
  if (!phoneNumberRegex.test(phoneNumber)) {
    return res.status(400).json({ success: false, message: 'Invalid phone number format' });
  }

  const otp = Math.floor(100000 + Math.random() * 900000);

  client.messages
    .create({
      body: `Your OTP code is ${otp}`,
      from: twilioPhone,
      to: phoneNumber,
    })
    .then(message => {
      console.log('Message sent:', message.sid);
      res.json({ success: true, otp });
    })
    .catch(error => {
      console.error('Error sending OTP:', error);
      res.status(500).json({
        success: false,
        message: 'Failed to send OTP',
        error: {
          message: error.message,
          code: error.code,
          moreInfo: error.moreInfo,
        },
      });
    });
});

const PORT = process.env.PORT || 5001;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
