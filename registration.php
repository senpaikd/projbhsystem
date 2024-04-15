<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
   <style>
       body {
                font-family: Arial, sans-serif;
                background-color: #f3f3f3;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
 
            .main {
                background-color: #fff;
                border-radius: 15px;
                box-shadow: 0 0 20px
                    rgba(0, 0, 0, 0.2);
                padding: 20px;
                width: 300px;
            }
 
            .main h2 {
                color: #4caf50;
                margin-bottom: 20px;
            }
 
            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
                font-weight: bold;
            }
 
            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                width: 100%;
                margin-bottom: 15px;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
 
            button[type="submit"] {
                padding: 15px;
                border-radius: 10px;
                border: none;
                background-color: #4caf50;
                color: white;
                cursor: pointer;
                width: 100%;
                font-size: 16px;
            }
   </style>
</head>
<body>

   <form>
   	   <label for="uname">Username</label><br>
         <input type="text" id="uname" name="uname"><br>
         <label for="password">Password:</label>
                <input type="password"id="password" name="password" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" title="Password must contain at least one number, one alphabet, one symbol, and be at least 8 characters long" required />
         <label for="repassword">Re-type Password:</label>
                <input type="password" id="repassword" name="repassword" required/>
         <label for="mobile">Contact:</label>
               <input type="text" id="mobile" name="mobile" maxlength="10" required/>
         <label for="gender">Gender:</label>
         <select id="gender" name="gender" required >
               <option value="male">Male</option>
               <option value="female">Female</option>
         </select>
 
         <button type="submit">Submit</button>

   </form>
</body>
</html>