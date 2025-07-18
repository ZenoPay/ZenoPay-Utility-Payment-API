const axios = require('axios');

const headers = {
  'Content-Type': 'application/json',
  'x-api-key': 'YOUR_API_KEY'
};

const data = {
  transid: 'ASAJCJ77JJXsdaadSTVM0',
  utilitycode: 'TOP',
  utilityref: '0744963858',
  amount: 500,
  pin: '2025',
  msisdn: '0744963858'
};

axios.post('https://zenoapi.com/api/payments/utilitypayment/process/', data, { headers })
  .then(res => console.log(res.data))
  .catch(err => console.error(err.response.data));
