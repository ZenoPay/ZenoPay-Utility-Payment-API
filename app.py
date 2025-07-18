import requests

url = "https://zenoapi.com/api/payments/utilitypayment/process/"
headers = {
    "Content-Type": "application/json",
    "x-api-key": "YOUR_API_KEY"
}
data = {
    "transid": "ASAJCsdsdsJ77JJXdSTVM0",
    "utilitycode": "TOP",
    "utilityref": "0744963858",
    "amount": 500,
    "pin": "2025",
    "msisdn": "0744963858"
}

response = requests.post(url, json=data, headers=headers)
print(response.status_code)
print(response.json())
