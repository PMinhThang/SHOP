<!DOCTYPE html>
<html lang="vi">

<style>
    h2 {
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<body>
    <section id="contact">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="map">
                        <!-- Paste mã nhúng của Google Maps Embed API vào đây -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9366542846224!2d106.61605357451671!3d10.739365659877313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dd00a579d13%3A0xe9427c96b34ebd72!2zMjkgTmd1eeG7hW4gSOG7m2ksIEFuIEzhuqFjLCBCw6xuaCBUw6JuLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1713432515862!5m2!1svi!2s"
                            width="950" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-info col-md-6">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Thông tin Liên Hệ</h2>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size:20px;"><strong>Địa
                                chỉ:</strong><br> 12 Trịnh Đình Thảo, Hoà Thanh, Tân Phú, Thành phố Hồ Chí Minh</p>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size:20px;"><strong>Điện
                                thoại:</strong><br> 028 3997 7898</p>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size:20px;">
                            <strong>Email:</strong><br> kissnoteshop@gmail.com
                        </p>
                    </div>
                    <div class="contact-form col-md-6">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Gửi tin nhắn</h2>
                        <form action="process_contact_form.php" method="post">
                            <input type="text" name="name" placeholder="Họ và Tên" id="name" required>
                            <input type="email" name="email" placeholder="Email" id="email" required>
                            <input type="tel" name="phone" placeholder="Số Điện Thoại" id="phone">
                            <textarea name="message" placeholder="Tin nhắn" id="content" required></textarea>
                            <button type="submit" id="submit">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script>
   
    document.addEventListener("DOMContentLoaded", () => {
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const content = document.getElementById("content");
        const submit = document.getElementById("submit");
        submit.addEventListener("click", (e) => {
            e.preventDefault();
            const data = {
                name: name.value,
                email: email.value,
                phone: phone.value,
                content: content.value,
            };
            postGoogle(data);
            alert("Tin nhắn đã được gửi thành công!");
            document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("content").value = "";
        });
        async function postGoogle(data) {
            const formURL = "https://docs.google.com/forms/d/e/1FAIpQLSeqpbeU-nvFld4aOyINRNeGEO_AKe3HLAKcVW7s-OAHX55OZQ/formResponse";
            const formData = new FormData();
            formData.append("entry.349932752", data.name);
            formData.append("entry.789352656", data.email);
            formData.append("entry.1484869064", data.phone);
            formData.append("entry.443336338", data.content);
            await fetch(formURL, {
                method: "POST",
                body: formData,
            });
        }
    });
    
</script>
<style>
    body {
        font-family: 'Times New Roman', Times, serif;
        margin: 0;
        padding: 11px;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }



    #contact {
        padding: 40px 0;
    }

    .contact-info {

        float: left;
        width: 40%;
    }

    .contact-form {
        float: right;
        width: 40%;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .contact-form button {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
</style>
<?php
include_once "View/footer.php";
?>