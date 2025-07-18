
# ⚡ ZenoPay Utility Payment API

ZenoPay provides powerful fintech APIs for seamless integration of utility payments across Tanzania. This API allows developers to programmatically pay for services like electricity, TV, airtime, broadband, government bills, and more.

---

## 🔗 API Endpoint

**Base URL**: `https://zenoapi.com/api/payments/utilitypayment/process/`  
**Method**: `POST`  
**Auth Header**: `x-api-key: YOUR_API_KEY`

---

## 📤 Request Body

```json
{
  "transid": "ASAJCJ77jjiikJJXdSTVM0",      // Unique transaction ID from client system
  "utilitycode": "TOP",                // Type of utility to pay
  "utilityref": "0744963858",          // Customer reference: meter no, card no, phone etc.
  "amount": 500,                       // Amount in TZS
  "pin": "2025",                       // 4-digit secure PIN
  "msisdn": "0744963858"              // Paying customer's mobile number
}
````

---

## ✅ Example Request

```bash
curl -X POST https://zenoapi.com/api/payments/utilitypayment/process/ \
  -H "Content-Type: application/json" \
  -H "x-api-key: YOUR_API_KEY" \
  -d '{
        "transid": "ASAJCJ7kkjj7JJXdSTVM0",
        "utilitycode": "TOP",
        "utilityref": "0744963858",
        "amount": 500,
        "pin": "2025",
        "msisdn": "0744963858"
      }'
```

---

## 📦 Available Utility Codes

### Airtime & Electricity

| Code     | Ref Label | Example            | Lookup | Description          |
| -------- | --------- | ------------------ | ------ | -------------------- |
| `TOP`    | Mobile No | `074XXXXXXX`       | ❌      | Prepaid Airtime      |
| `LUKU`   | Meter No  | `01234567891`      | ✅      | Electricity (LUKU)   |
| `TUKUZA` | Meter No  | `01234567891`      | ✅      | Electricity (TUKUZA) |
| `NCARD`  | Card No   | `8888111188881111` | ✅      | N-Card Top Up        |

### TV Subscriptions

| Code        | Ref Label           | Example        | Lookup | Description          |
| ----------- | ------------------- | -------------- | ------ | -------------------- |
| `DSTV`      | Smartcard No        | `01234567891`  | ✅      | DSTV Subscriptions   |
| `DSTVBO`    | Smartcard No        | `01234567891`  | ✅      | DSTV Box Office      |
| `AZAMTV`    | Smartcard No        | `012345678912` | ✅      | AZAMTV Subscriptions |
| `STARTIMES` | Customer ID/Card No | `01234567891`  | ✅      | StarTimes            |
| `ZUKU`      | Account No          | `012345`       | ✅      | ZUKU TV              |

### Internet

| Code        | Ref Label  | Example       | Lookup | Description         |
| ----------- | ---------- | ------------- | ------ | ------------------- |
| `SMILE`     | Account No | `01234567891` | ✅      | Smile 4G            |
| `ZUKUFIBER` | Account No | `012345`      | ✅      | ZUKU Fiber Internet |
| `TTCL`      | Mobile No  | `01234567891` | ❌      | TTCL Broadband      |

### Government

| Code        | Ref Label  | Example        | Lookup | Description               |
| ----------- | ---------- | -------------- | ------ | ------------------------- |
| `GEPG`      | Control No | `991234567891` | ✅      | GEPG Payments (Gov Bills) |
| `ZANMALIPO` | Control No | `991234567891` | ✅      | Zanzibar Gov Payments     |

### Flights & Tickets

| Code      | Ref Label   | Example      | Lookup | Description      |
| --------- | ----------- | ------------ | ------ | ---------------- |
| `PW`      | Booking Ref | `0123456789` | ✅      | Precision Air    |
| `COASTAL` | Booking Ref | `0123456`    | ✅      | Coastal Aviation |
| `AURIC`   | Booking Ref | `012345`     | ✅      | Auric Air        |

### Pensions & Merchants

| Code        | Ref Label  | Example       | Lookup | Description             |
| ----------- | ---------- | ------------- | ------ | ----------------------- |
| `UTT`       | Account No | `012345678`   | ✅      | UTT Amis                |
| `SELCOMPAY` | Account No | `01234567891` | ✅      | Selcom/Masterpass Merch |

---

## ✅ Response Example

```json
{
  "status": "SUCCESS",
  "resultCode": "000",
  "message": "Transaction initiated successfully.",
  "data": {
    "amount": 500,
    "msisdn": "0744963858",
    "transactionRef": "6a8f29b2-dfe6-4d52-94ab-d1f4d7f37b21"
  }
}
```

---

## ❗ Error Example

```json
{
  "status": "FAILED",
  "resultCode": "109",
  "message": "Invalid meter or reference number",
  "data": {}
}
```

---

## 🔐 Authentication

Every request **must** include a valid API key:

```http
x-api-key: YOUR_API_KEY
```

If your API key is missing or invalid, you'll receive a 403 Forbidden error.

---

## 📄 Postman Collection

> Download and import the Postman collection in [`/docs/postman_collection.json`](docs/postman_collection.json) to test all utilities quickly.

---

## 🧠 Notes

* Use a unique `transid` for each payment request to avoid duplicates.
* The system automatically validates reference numbers if `LookUp` is available.
* All amounts are in **Tanzanian Shillings (TZS)**.

---

## 📞 Support

For help and onboarding, contact us:

📧 [support@zenoapi.com](mailto:support@zenoapi.com)
📱 WhatsApp: +255 6XX XXX XXX
🌐 [zenoapi.com](https://zenoapi.com)

---

## 🧾 License

MIT License. See `LICENSE`.

```