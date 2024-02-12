<?php
// Kiểm tra xem dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem phần tử 'dateInput' có tồn tại trong mảng $_POST hay không
    if (isset($_POST["dateInput"])) {
        // Lấy giá trị ngày từ form
        $dateValue = $_POST["dateInput"];

        // Tiếp tục xử lý dữ liệu và ghi vào tệp văn bản ở đây
        // Ví dụ: Ghi dữ liệu vào tệp văn bản data.txt
        $filename = "data.txt";
        $file = fopen($filename, "a") or die("Không thể mở tệp!");
        fwrite($file, "Date: " . $dateValue . "\n");
        fclose($file);

        // Chuyển hướng sang trang food.html sau khi ghi dữ liệu thành công
        header("Location: ../food.html");
        exit(); // Đảm bảo không có mã PHP hoặc HTML được thêm vào sau header()
    } else {
        // Nếu không có phần tử 'dateInput' trong mảng $_POST, hiển thị thông báo lỗi
        echo "Không có dữ liệu 'dateInput' được gửi từ form!";
    }
} else {
    // Hiển thị thông báo nếu không có dữ liệu gửi đi từ form
    echo "Không có dữ liệu được gửi từ form!";
}
?>
