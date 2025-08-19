<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instructor Payment Setup</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-2xl w-full max-w-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Setup Payment Details</h2>

    <form action="/instructor/payment_setup" method="POST" class="space-y-4">
      @csrf

      <!-- Card Type -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">Card Type</label>
        <select name="card_type" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <option value="" disabled selected>Select Card Type</option>
          <option value="visa">Visa</option>
          <option value="mastercard">MasterCard</option>
        </select>
      </div>

      <!-- Cardholder Name -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">Cardholder Name</label>
        <input type="text" name="cardholder_name" placeholder="As per bank records" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <!-- Card Number -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">Card Number</label>
        <input type="text" name="card_number" maxlength="16" placeholder="16-digit card number" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <!-- Expiry Date -->
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-1">Expiry Month</label>
          <input type="number" name="expiry_month" min="1" max="12" placeholder="MM" required
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-1">Expiry Year</label>
          <input type="number" name="expiry_year" min="2024" max="2050" placeholder="YYYY" required
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
      </div>

      <!-- CVV -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">CVV</label>
        <input type="password" name="cvv" maxlength="3" placeholder="3-digit code" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
        Save Payment Details
      </button>
    </form>
  </div>

</body>
</html>
