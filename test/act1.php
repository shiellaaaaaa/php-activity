<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>

    <h1>Vendo Machine</h1>
    <form method="POST">
        <fieldset style="width: 500px;">
            <legend>Products</legend>
            
            <label>
                <input type="checkbox" name="items[]" value="Coke"> Coke - ₱15
            </label><br>
            
            <label>
                <input type="checkbox" name="items[]" value="Sprite"> Sprite - ₱20
            </label><br>
            
            <label>
                <input type="checkbox" name="items[]" value="Royal"> Royal - ₱20
            </label><br>
            
            <label>
                <input type="checkbox" name="items[]" value="Pepsi"> Pepsi - ₱15
            </label><br>
            
            <label>
                <input type="checkbox" name="items[]" value="Mountain Dew"> Mountain Dew - ₱20
            </label>
            
        </fieldset>

        <fieldset style="width: 500px;">
            <legend>Options</legend>
            
            <label for="drink_size">Size:</label>
            <select id="drink_size" name="drink_size">
                <option value="Regular">Regular</option>
                <option value="Up-Size">Up-Size (add ₱5)</option>
                <option value="Jumbo">Jumbo (add ₱10)</option>
            </select>

            <label for="item_quantity">Qty:</label>
            <input type="number" id="item_quantity" name="item_quantity" min="1" value="1" style="width: 140px;">
            &nbsp;
            <button type="submit" name="submit_order">Checkout</button>
        
        </fieldset>
    </form>

    <?php
    if (isset($_REQUEST['submit_order'])) {
        $product_prices = [
            "Coke" => 15,
            "Sprite" => 20,
            "Royal" => 20,
            "Pepsi" => 15,
            "Mountain Dew" => 20
        ];

        $chosen_items = $_POST['items'] ?? [];
        $selected_size = $_POST['drink_size'] ?? 'Regular';
        $quantity_chosen = intval($_POST['item_quantity'] ?? 0);

        $additional_cost = 0;
        if ($selected_size === "Up-Size") $additional_cost = 5;
        elseif ($selected_size === "Jumbo") $additional_cost = 10;

        if (empty($chosen_items)) {
            echo "<hr><p>No Selected Product, Try Again</p>";
        } else {

            $total_quantity = 0;
            $total_cost = 0;
            echo "<hr><p>Purchase Summary:</p><ul>";

            foreach ($chosen_items as $item) {
                $item_price = $product_prices[$item] + $additional_cost;
                $item_total = $item_price * $quantity_chosen;
                $total_cost += $item_total;
                $total_quantity += $quantity_chosen;

                $unit_text = $quantity_chosen > 1 ? "pieces" : "piece";

                echo "<li>$quantity_chosen $unit_text of $selected_size $item amounting to ₱$item_total</li>";
            }

            echo "</ul>";
            echo "<p>Total Number of Items: $total_quantity</p>";
            echo "<p>Total Amount: ₱$total_cost</p>";
        }
    }
    ?>

</body>
</html>