<?php
    session_start();
    if(!isset($_SESSION['mail'])){
        header("Location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <title>Offers</title>
    <style>
        .cnt {
            width: 97vw;
            height: 77vh;
            margin: 20px ;
            margin-top: 10px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .column{
            float: left;
            width: 25%;
        }
        .containe::after{
            content: "";
            display: table;
            clear: both;
        }

        button {
            padding: 10px 20px;
            margin: 10px 5px 5px 5px;
            font-size: 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container {
            display: none;
            padding: 20px 0;
        }

        .active {
            display: block;
        }

        /* form {
            margin-bottom: 20px;
        } */

        label {
            /* color: gray; */
            display: inline-block;
            width: 125px;
            font-weight: bold;
        }
        h4{
            color: darkblue;
        }

        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="datetime-local"],
        select,
        button[type="submit"] {
            width: 200px;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        
        /* .option{
            height: 30px;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
            cursor: pointer;
        } */
        
        
        input[type="submit"] {
            background-color: rgb(24, 24, 228);
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(40, 40, 164);
        }
        
        .paymentMethodField{
            display: flex;
        }
        .paymentMethodField > input{
            width: 137px;
            margin-right: 3px;
        }
        #addField,#addField1{
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            text-decoration: none;
            display: block;
            text-align: center;
            background-color: #17a2b8;
            color: white;
            font-weight: bold;
        }
        .deleteBtn{
            background-color: rgb(241, 46, 46);
        }
        .deleteBtn:hover{
            background-color: rgb(218, 17, 17);
        }
        /* form{
            margin-bottom: 0px;
        } */


        
    </style>
</head>
<body>

<div class="nav">
        <div class="d-flex align-items-center">
            <a href="admindash.php">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            </a>
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="admin.php"><li class="list">Home</li></a>
                <a href="product.php"><li class="list">Product</li></a>
                <a href="transaction.php"><li class="list">Transactions</li></a>
                <a href="offer.php"><li class="list">Offers</li></a>
            </ul>
    </div>
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <p>Hi, <?php echo $_SESSION['aname'] ?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
      </div>
</div>

<center>
    <button onclick="showForm(1)">For All</button>
    <button onclick="showForm(2)">For UPI</button>
    <button onclick="showForm(3)">For NetBanking</button>
    </center>
<div class="cnt">
    
    <form id="form1" action="create_offer_api2.php" method="post" class="form-container active">
        <h2>Create Offer For All</h2>
        <div class="column">
        <!-- <form action="create_offer_api2.php" method="post"> -->
            <h4>Offer meta</h4>
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
    
        </div>

        <div class="column">
            <h4>Offer tnc:</h4>
            <label for="">Offer tnc type:</label>
            <select name="offer_tnc_type" id="">
                <option value="text">text</option>
                <option value="link">link</option>
            </select>
            <br> <br>
    
            <label for="">Offer tnc value:</label>
            <input type="text" name="offer_tnc_value" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, accusantium." id="">
    
            <h4>Offer Details</h4>
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
    
        </div>

        <div class="column">
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
    
            <h4>Offer validation:</h4>
            <label for="">Min amount:</label>
            <input type="number" name="min_amount" placeholder="1" id="">
            <br> <br>
    
        </div>

        <div class="column">
            <label for="">Max allowed:</label>
            <input type="number" name="max_allowed" placeholder="1"  id="">
            <br> <br>
    
            <h4>Payment method:</h4>
            <div id="paymentMethods">
            <!-- Existing payment methods go here -->
            </div>
            <br>
            <a href="#" id="addField">Add Field</a>
    
        
            <br>
            <center>
            <input type="submit" value="Submit">
            </center>
        </div>
        <!-- </form> -->
    </form>

    <form id="form2" action="create_offer_api3.php" method="post" class="form-container">
        <h2>Create Offer For UPI</h2>
        <div class="column">
        <!-- <form action="create_offer_api3.php" method="post"> -->
            <h4>Offer meta</h4>
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
        
        </div>

        <div class="column">
            <h4>Offer tnc:</h4>
            <label for="">Offer tnc type:</label>
            <select name="offer_tnc_type" id="">
                <option value="text">text</option>
                <option value="link">link</option>
            </select>
            <br> <br>
    
            <label for="">Offer tnc value:</label>
            <input type="text" name="offer_tnc_value" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, accusantium." id="">
    
            <h4>Offer Details</h4>
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
        
        </div>

        <div class="column">
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
    
            <h4>Offer validation:</h4>
            <label for="">Min amount:</label>
            <input type="number" name="min_amount" placeholder="1" id="">
            <br> <br>
        
        </div>

        <div class="column">
            <label for="">Max allowed:</label>
            <input type="number" name="max_allowed" placeholder="1"  id="">
            <br> <br>
    
            <h4>Payment method:</h4>
            <h6>For UPI</h6>
            <div id="paymentMethods1">
            <!-- Existing payment methods go here -->
            </div>
            <a href="#" id="addField1">Add Field</a>
            <br>

            <center>
            <input type="submit" value="Submit">
            </center>
        </div>
        <!-- </form> -->
    </form>

    <form id="form3" action="create_offer_api.php" method="post" class="form-container">
        <h2>Create Offer For NetBanking</h2>
        <div class="column">
        <!-- <form action="create_offer_api.php" method="post"> -->
            <h4>Offer meta</h4>
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
        </div>

        <div class="column">
            <h4>Offer tnc:</h4>
            <label for="">Offer tnc type:</label>
            <select name="offer_tnc_type" id="">
                <option value="text">text</option>
                <option value="link">link</option>
            </select>
            <br> <br>
    
            <label for="">Offer tnc value:</label>
            <input type="text" name="offer_tnc_value" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, accusantium." id="">
    
            <h4>Offer Details</h4>
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
        </div>

        <div class="column">
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
    
            <h4>Offer validation:</h4>
            <label for="">Min amount:</label>
            <input type="number" name="min_amount" placeholder="1" id="">
            <br> <br>
        </div>

        <div class="column">
            <label for="">Max allowed:</label>
            <input type="number" name="max_allowed" placeholder="1"  id="">
            <br> <br>
    
            <h4>Payment method:</h4>
            <label for="">Bank name:</label>
            <input type="text" name="bank_name" placeholder="all" id="">
            <br><br>
            
            <center>
            <input type="submit" value="Submit">
            </center>
        </div>
        <!-- </form> -->
    </form>
</div>

<script>
    // JavaScript to add key and value add Fields
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
            deleteBtn.classList.add('deleteBtn');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.addEventListener('click', () => {
                newField.remove();
            });
            newField.appendChild(deleteBtn);

            paymentMethods.appendChild(newField);
        });


        const paymentMethods1 = document.getElementById('paymentMethods1');
        const addFieldBtn1 = document.getElementById('addField1');

        addFieldBtn1.addEventListener('click', (e) => {
            e.preventDefault();

            const newField1 = document.createElement('div');
            newField1.classList.add('paymentMethodField');

            const keyInput1 = document.createElement('input');
            keyInput1.type = 'text';
            keyInput1.name = 'payment_method_key[]';
            keyInput1.placeholder = 'Key';
            newField1.appendChild(keyInput1);

            const valueInput1 = document.createElement('input');
            valueInput1.type = 'text';
            valueInput1.name = 'payment_method_value[]';
            valueInput1.placeholder = 'Value';
            newField1.appendChild(valueInput1);

            const deleteBtn1 = document.createElement('button');
            deleteBtn1.classList.add('deleteBtn');
            deleteBtn1.type = 'button';
            deleteBtn1.textContent = 'Delete';
            deleteBtn1.addEventListener('click', () => {
                newField1.remove();
            });
            newField1.appendChild(deleteBtn1);

            paymentMethods1.appendChild(newField1);
        });


    // JavaScript to Switch Forms
    function showForm(formNumber) {
        // Hide all forms
        var forms = document.getElementsByClassName("form-container");
        for (var i = 0; i < forms.length; i++) {
            forms[i].classList.remove("active");
        }
        
        // Show the selected form
        var formId = "form" + formNumber;
        document.getElementById(formId).classList.add("active");
    }
</script>

</body>
</html>
