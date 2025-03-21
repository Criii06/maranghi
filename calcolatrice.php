<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        table {
            border: 1px solid #000;
            border-collapse: collapse;
            margin: 20px auto;
        }

        td {
            border: 1px solid #000;
            padding: 20px;
            text-align: center;
        }

        button {
            width: 100px;
            height: 100px;
            font-size: 24px;
            border: none;
            background-color: #f0f0f0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ddd;
        }

        #schermoRisultato {
            width: 400px;
            height: 60px;
            text-align: right;
            font-size: 32px;
            padding: 10px;
            background-color: #e0e0e0;
            border: 1px solid #000;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="4" id="schermoRisultato"></td>
        </tr>
        <tr>
            <td><button>1</button></td>
            <td><button>2</button></td>
            <td><button>3</button></td>
            <td><button>+</button></td>
        </tr>
        <tr>
            <td><button>4</button></td>
            <td><button>5</button></td>
            <td><button>6</button></td>
            <td><button>-</button></td>
        </tr>
        <tr>
            <td><button>7</button></td>
            <td><button>8</button></td>
            <td><button>9</button></td>
            <td><button>*</button></td>
        </tr>
        <tr>
            <td><button>0</button></td>
            <td><button>.</button></td>
            <td><button>=</button></td>
            <td><button>/</button></td>
        </tr>
    </table>

    <script>
        const buttons = document.querySelectorAll('button');
        const screen = document.getElementById('schermoRisultato');
        
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const value = this.textContent;
                if (value === '=') {
                    
                } else {
                    screen.textContent += value;
                }
            });
        });
    </script>

    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST['op1'])) {
            $op1 = $_POST['op1'];
        }
        }else{
            echo "imbecille";
        }
    

        if (isset($_POST['op2'])) {
            $op2 = $_POST['op2'];
        }else{
            echo "imbecille";
        }


    ?>

</body>
</html>
