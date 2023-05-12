# EasyGame_Do-an-da-nganh-HK222
Ngôn ngữ: Js, PHP, MySQL. Không sử dụng frameworks (vì không biết sử dụng :D ).
Đầu tiên cần cài đặt và XAMPP bản mới nhất (chạy dưới quyền admin), sau đó khởi chạy 2 server MySQL và Apache.

Clone github này về và để trong htdocs của folder XAMPP.

Import file sql vào MySQL trong XAMPP trong http://localhost/phpmyadmin.

Vô trình duyệt gõ http://localhost/EasyGame, web sẽ tự điều hướng sang clients.

Đăng nhập: 
  Tài khoản: admin@gmail.com 
  Password: admin


Bên server để liên kết với các thiết bị Adruino thì copy đường dẫn của file 'getData.php' trong folder 'servers/data' và thay ở trong file code của Adruino. Thông tin về thiết bị IoT được ghi hết trong file báo cáo .pdf. 

Vì nhóm sử dụng thiết bị khác với thiết bị bên nhà trường cấp cho nhưng về lý thuyết thì chức năng đều y hệt nhau. Duy nhất chỉ khác cách implement bên Adruino và send API tới server. (ở trong folder Adruino có 2 file là `Demo_Master_PHP.ino` và `Node1.ino` thì `Demo_Master_PHP.ino` là code dành cho thiết bị trung gian (cũng có ghi lại trong báo cáo), các nhóm khác hình như không có sử dụng thiết bị này. Cho nên source code này cần rất nhiều sự thay đổi về backend lẫn bên thiết bị nếu muốn dùng lại cho project khác.

Kết quả trang web: 

- Chức năng `auto` chưa fix xong, sau khi set thì các ngưỡng giá trị cho các thiết bị trong db chưa tự động cập nhật lại và send ngược về thiết bị.

- Chức năng thông báo khi vượt ngưỡng chưa hiện thực.
