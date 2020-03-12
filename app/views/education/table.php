<link href='/public/assets/css/tablestyl.css' rel='stylesheet'>
<div class='titl'>
    <p>Севастопольский государственный университет</p>
    Кафедра "Информационные системы"
</div>
<table class='table_blur'>
    <tr>
        <td class='kurs' rowspan='2'>Курс 1</td>
        <td class='sem'>Семестр 1</td>
        <td>Высшая математика</td>
        <td>Русский язык</td>
        <td>Английский язык</td>
        <td>Экология</td>
        <td>История</td>
        <td>АиП</td>
        <td>Информатика</td>
        <td>Физика</td>
        <td>Физкультура</td>
    </tr>
    <tr>
        <td class='sem'>Семестр 2</td>
        <td>Физика</td>
        <td>Английский язык</td>
        <td>Высшая математика</td>
        <td>Основы права</td>
        <td>Экономика</td>
        <td>Дискретная математика</td>
        <td>АиП</td>
        <td>Философия</td>
        <td>Физкультура</td>
    </tr>
</table>
<script>
    $("#body").ready(function() {
        setCookie('educPage', 1, 10);
        localStorage.setItem('educPage', Number(localStorage.getItem('educPage')) + 1);
    });
</script>
</body>