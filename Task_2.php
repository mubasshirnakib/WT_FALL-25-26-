<!DOCTYPE html>
<html>
<head>
    <title>Student Registration & Course Selection</title>

    <style>
        div{
            padding: 20px;
            border: 3px solid black;
            border-radius: 6px;
            width: 550px;
            margin: auto;
            background: white;
        }
        input[type='submit'], button{
            background-color: blue;
            color: white;
            padding: 7px 15px;
            border: none;
            border-radius: 4px;
        }
        table td{
            padding: 6px;
        }
        #outputBox{
            margin-top: 20px;
            padding: 10px;
            border: 2px solid green;
            background: lightgreen;
            display: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 6px;
            background: darkgrey;
            margin-top: 5px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }
        .deleteBtn {
            background: red;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
</head>

<body>

<center><h1>Student Registration</h1></center>

<div>
<form id="studentForm">

<table>

<tr>
    <td>Full Name :</td>
    <td><input type="text" id="fullName"></td>
</tr>

<tr>
    <td>Email :</td>
    <td><input type="text" id="email"></td>
</tr>

<tr>
    <td>Password :</td>
    <td><input type="password" id="password"></td>
</tr>

<tr>
    <td>Confirm Password :</td>
    <td><input type="password" id="confirmPassword"></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" value="Register">
    </td>
</tr>

</table>

</form>
</div>

<div id="outputBox"></div>

<br><br>

<center><h1>Course Selection</h1></center>

<div>

<table>
<tr>
    <td>Course Name :</td>
    <td><input type="text" id="courseInput"></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button id="addBtn">Add Course</button>
    </td>
</tr>
</table>

<ul id="courseList"></ul>

</div>

<script>

document.getElementById("studentForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const name = document.getElementById("fullName").value.trim();
    const email = document.getElementById("email").value.trim();
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirmPassword").value;

    if (name === "" || email === "" || pass === "" || confirm === "") {
        alert("All fields are required!");
        return;
    }
    if (!email.includes("@")) {
        alert("Email must contain '@'");
        return;
    }
    if (pass !== confirm) {
        alert("Passwords do not match!");
        return;
    }

    let box = document.getElementById("outputBox");
    box.style.display = "block";
    box.innerHTML = `
        <h3>Registration Successful</h3>
        <p><b>Name:</b> ${name}</p>
        <p><b>Email:</b> ${email}</p>
    `;
});

document.getElementById("addBtn").addEventListener("click", function() {
    let course = document.getElementById("courseInput").value.trim();

    if (course === "") {
        alert("Please enter a course name!");
        return;
    }

    let li = document.createElement("li");
    li.innerHTML = `
        ${course}
        <button class="deleteBtn" onclick="this.parentElement.remove()">Delete</button>
    `;

    document.getElementById("courseList").appendChild(li);

    document.getElementById("courseInput").value = "";
});
</script>

</body>
</html>
