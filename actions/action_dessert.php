<?php
// Kiểm tra xem dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem phần tử 'dessert' có tồn tại trong mảng $_POST hay không
    if (isset($_POST["dessert"])) {
        // Lấy danh sách các mục được chọn từ form
        $selectedDesserts = $_POST["dessert"];

        // Mở hoặc tạo tệp văn bản để ghi
        $filename = "data.txt";
        $file = fopen($filename, "a") or die("Không thể mở tệp!");

        // Ghi mỗi mục được chọn vào file "data.txt"
        foreach ($selectedDesserts as $dessert) {
            fwrite($file,"Dessert: " . $dessert . "\n");
        }

        // Đóng tệp văn bản
        fclose($file);

        // Chuyển hướng người dùng sau khi đã lưu thành công
        header("Location: ../activities.html");
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
