<!DOCTYPE html>
<html>
<head>
    <title>Diskon</title>
</head>
<body>
<form method="POST" action="">
    Apakah Anda Member? (ya/tidak): 
    <input type="text" name="member" required></br>
    Total Belanja (Rp): 
    <input type="number" name="Tbelanja" required></br>
    <input type="submit" value="Hitung Diskon">
</form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member = strtolower($_POST['member']) == "ya"; 
    $total_belanja = $_POST['Tbelanja'];

        function hitung_diskon($member, $total_belanja) {
            $diskon = 0; 

        if ($member) { 
            if ($total_belanja > 1000000){
                $diskon = 0.15;
            } elseif ($total_belanja > 500000) {
                $diskon = 0.10;
            } else {
                $diskon = 0.10;
            }
        } 

        else {
            if ($total_belanja > 1000000) {
                $diskon = 0.10;
            } elseif ($total_belanja > 500000) {
                $diskon = 0.05;
            } else {
                $diskon = 0;
            }
        }

        $total_pembayaran = $total_belanja - ($total_belanja * $diskon);
        return array($total_pembayaran, $diskon * 100);
    }

    list($total_pembayaran, $persentase_diskon) = hitung_diskon($member, $total_belanja);

    echo "<br>Mendapat diskon sebesar: " . $persentase_diskon . "%<br>";
    echo "Total Pembayaran: Rp " . number_format($total_pembayaran, 0, ',', '.') . "<br>";
    
    }
?>

</body>
</html>