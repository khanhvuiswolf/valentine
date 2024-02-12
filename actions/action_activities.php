<?php
// Kiểm tra xem dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem phần tử 'activities' có tồn tại trong mảng $_POST hay không
    if (isset($_POST["activities"])) {
        // Lấy danh sách các mục được chọn từ form
        $selectedActivities = $_POST["activities"];

        // Mở hoặc tạo tệp văn bản để ghi
        $filename = "data.txt";
        $file = fopen($filename, "a") or die("Không thể mở tệp!");

        // Ghi mỗi mục được chọn vào file "data.txt"
        foreach ($selectedActivities as $activity) {
            fwrite($file,"Activity: " . $activity . "\n");
        }

        // Đóng tệp văn bản
        fclose($file);

        // Chuyển hướng người dùng sau khi đã lưu thành công
        header("Location: ../lastpage/lastpage.html");
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
