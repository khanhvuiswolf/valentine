<?php
// Kiểm tra xem dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem phần tử 'food' có tồn tại trong mảng $_POST hay không
    if (isset($_POST["food"])) {
        // Lấy danh sách các mục được chọn từ form
        $selectedFood = $_POST["food"];
        
        // Mở tệp văn bản để ghi
        $filename = "data.txt";
        $file = fopen($filename, "a") or die("Không thể mở tệp!");

        // Lưu mỗi mục được chọn vào file "data.txt"
        foreach ($selectedFood as $food) {
            fwrite($file, "Food: " . $food . "\n");
        }
        
        // Đóng tệp văn bản
        fclose($file);

        // Chuyển hướng người dùng sau khi đã lưu thành công
        header("Location: ../dessert.html");
        exit();
    } else {
        // Hiển thị thông báo nếu không có mục nào được chọn từ form
        echo "Không có mục được chọn từ form!";
    }
} else {
    // Hiển thị thông báo nếu không có dữ liệu gửi đi từ form
    echo "Không có dữ liệu được gửi từ form!";
}
?>
