<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl font-bold mb-6 text-center">Calculator</h2>
        <form id="calcForm" class="space-y-4" method="post" action="cal.php">
            <div>
                <label for="first" class="block text-gray-700">First Value:</label>
                <input type="number" id="first" name="first" class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required value="<?= isset($_POST['first']) ? htmlspecialchars($_POST['first']) : '' ?>">
            </div>
            <div>
                <label for="second" class="block text-gray-700">Second Value:</label>
                <input type="number" id="second" name="second" class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required value="<?= isset($_POST['second']) ? htmlspecialchars($_POST['second']) : '' ?>">
            </div>
            <div class="flex justify-between items-center">
                <label class="inline-flex items-center">
                    <input type="radio" name="operation" value="add" <?= (!isset($_POST['operation']) || $_POST['operation'] === 'add') ? 'checked' : '' ?> class="form-radio text-blue-600">
                    <span class="ml-2">+</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="operation" value="subtract" <?= (isset($_POST['operation']) && $_POST['operation'] === 'subtract') ? 'checked' : '' ?> class="form-radio text-blue-600">
                    <span class="ml-2">-</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="operation" value="times" <?= (isset($_POST['operation']) && $_POST['operation'] === 'times') ? 'checked' : '' ?> class="form-radio text-blue-600">
                    <span class="ml-2">&times;</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="operation" value="divide" <?= (isset($_POST['operation']) && $_POST['operation'] === 'divide') ? 'checked' : '' ?> class="form-radio text-blue-600">
                    <span class="ml-2">&divide;</span>
                </label>
            </div>
            <input type="submit" name="submit" Value="Calculate" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        </form>
        <div id="result" class="mt-6 text-center text-xl font-semibold text-green-600">
            <?php
            if (isset($_POST['submit'])) {
                $first = $_POST['first'];
                $second = $_POST['second'];
                $operation = $_POST['operation'];

                if ($operation === 'add') {
                    echo htmlspecialchars($first + $second);
                } elseif ($operation === 'subtract') {
                    echo htmlspecialchars($first - $second);
                } elseif ($operation === 'times') {
                    echo htmlspecialchars($first * $second);
                } elseif ($operation === 'divide') {
                    if ($second != 0) {
                        echo htmlspecialchars($first / $second);
                    } else {
                        echo "Cannot divide by zero";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>