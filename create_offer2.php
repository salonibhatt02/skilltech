<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create offer</title>
</head>
<style>

</style>
<body>
    <center><h1>For All</h1></center>
    <h2>Create offer</h2>
    
    <form action="create_offer_api2.php" method="post">
        <h3>Offer meta</h3>
        <label for="">Offer Title: </label>
        <input type="text" name="offer_title" placeholder="TEST" id="">
        <br> <br>

        <label for="">Offer Description: </label>
        <input type="text" name="offer_description" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, accusantium." id="">
        <br> <br>

        <label for="">Offer Code: </label>
        <input type="text" name="offer_code" placeholder="TESTOFFER" id="">
        <br> <br>

        <label for="">Offer Start Time:</label>
        <input type="datetime-local" name="offer_start_time" placeholder="2023-03-21T08:09:51Z" id="">
        <br> <br>

        <label for="">Offer End Time:</label>
        <input type="datetime-local" name="offer_end_time" placeholder="2023-03-21T08:09:51Z" id="">
        <br> <br>

        <h3>Offer tnc:</h3>
        <label for="">Offer tnc type:</label>
        <select name="offer_tnc_type" id="">
            <option value="text">text</option>
            <option value="link">link</option>
        </select>
        <br> <br>

        <label for="">Offer tnc value:</label>
        <input type="text" name="offer_tnc_value" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, accusantium." id="">

        <h3>Offer Details</h3>
        <label for="">Offer type:</label>
        <select name="offer_type" id="">
            <option value="DISCOUNT">Discount</option>
            <option value="CASHBACK">Cashback</option>
            <option value="DISCOUNT_AND_CASHBACK">Discount and Cashback</option>
            <option value="NO_COST_EMI">No cost emi</option>
        </select>

        <h4>Discount details</h4>
        <label for="">Discount type:</label>
        <select name="discount_type" id="">
            <option value="flat">Flat</option>
            <option value="percentage">Percentage</option>
        </select>
        <br> <br>

        <label for="">Discount value:</label>
        <input type="number" name="discount_value" placeholder="10" id="">
        <br> <br>

        <label for="">Max Discount amount:</label>
        <input type="number" name="max_discount_amount" placeholder="10" id="">

        <h4>Cashback details</h4>
        <label for="">Cashback type:</label>
        <select name="cashback_type" id="">
            <option value="flat">Flat</option>
            <option value="percentage">Percentage</option>
        </select>
        <br> <br>

        <label for="">Cashback value:</label>
        <input type="number" name="cashback_value" placeholder="20" id="">
        <br> <br>

        <label for="">Max Cashback amount:</label>
        <input type="number" name="max_cashback_amount" placeholder="150" id="">

        <h3>Offer validation:</h3>
        <label for="">Min amount:</label>
        <input type="number" name="min_amount" placeholder="1" id="">
        <br> <br>

        <label for="">Max allowed:</label>
        <input type="number" name="max_allowed" placeholder="1"  id="">
        <br> <br>

        <h3>Payment method:</h3>
        <div id="paymentMethods">
        <!-- Existing payment methods go here -->
        </div>
        <a href="#" id="addField">Add field</a>

        <br><br>
        
        <input type="submit" value="Submit">
    </form>
    <script>
        const paymentMethods = document.getElementById('paymentMethods');
        const addFieldBtn = document.getElementById('addField');

        addFieldBtn.addEventListener('click', (e) => {
            e.preventDefault();

            const newField = document.createElement('div');
            newField.classList.add('paymentMethodField');

            const keyInput = document.createElement('input');
            keyInput.type = 'text';
            keyInput.name = 'payment_method_key[]';
            keyInput.placeholder = 'Key';
            newField.appendChild(keyInput);

            const valueInput = document.createElement('input');
            valueInput.type = 'text';
            valueInput.name = 'payment_method_value[]';
            valueInput.placeholder = 'Value';
            newField.appendChild(valueInput);

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.addEventListener('click', () => {
                newField.remove();
            });
            newField.appendChild(deleteBtn);

            paymentMethods.appendChild(newField);
        });
    </script>
</body>
</html>