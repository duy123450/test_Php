<?php
echo "Pham Thai Duy - DH52200583 - D22_TH01 Nhom 09<hr>";
$questions = [
    [
        'id' => 1,
        'question_text' => 'Ngôn ngữ lập trình PHP được phát triển lần đầu tiên bởi ai?',
        'options' => [
            'a' => 'Bill Gates',
            'b' => 'Rasmus Lerdorf',
            'c' => 'Mark Zuckerberg',
            'd' => 'Larry Page'
        ],
        'correct_answer' => 'b'
    ],
    [
        'id' => 2,
        'question_text' => 'Trong PHP, hàm nào dùng để kiểm tra xem một biến có phải là một mảng hay không?',
        'options' => [
            'a' => 'is_object()',
            'b' => 'is_string()',
            'c' => 'is_array()',
            'd' => 'is_int()'
        ],
        'correct_answer' => 'c'
    ],
    [
        'id' => 3,
        'question_text' => 'Ký hiệu nào được sử dụng để bắt đầu một khối lệnh PHP?',
        'options' => [
            'a' => '/*...*/',
            'b' => '<?php',
            'c' => '<script>',
            'd' => '<html>'
        ],
        'correct_answer' => 'b'
    ],
    [
        'id' => 4,
        'question_text' => 'Biến (variable) trong PHP phải bắt đầu bằng ký hiệu nào?',
        'options' => [
            'a' => '@',
            'b' => '#',
            'c' => '$',
            'd' => '%'
        ],
        'correct_answer' => 'c'
    ],
    [
        'id' => 5,
        'question_text' => 'Trong PHP, toán tử so sánh "khác biệt" cả về giá trị và kiểu dữ liệu là gì?',
        'options' => [
            'a' => '!=',
            'b' => '<>',
            'c' => '!==',
            'd' => '=='
        ],
        'correct_answer' => 'c'
    ],
    [
        'id' => 6,
        'question_text' => 'Hàm nào được dùng để mở và đọc nội dung của một tập tin trong PHP?',
        'options' => [
            'a' => 'file_get_contents()',
            'b' => 'read_file()',
            'c' => 'open_file()',
            'd' => 'get_file_data()'
        ],
        'correct_answer' => 'a'
    ],
    [
        'id' => 7,
        'question_text' => 'Câu lệnh nào dùng để kết thúc việc thực thi script hiện tại trong PHP?',
        'options' => [
            'a' => 'stop',
            'b' => 'return',
            'c' => 'break',
            'd' => 'die'
        ],
        'correct_answer' => 'd'
    ]
];

$a = rand(2, count($questions) - 1);
$random_keys = array_rand($questions, $a);

$random_questions = [];
foreach ($random_keys as $key) {
    $random_questions[] = $questions[$key];
}
$stt = 1;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài Kiểm Tra Ngẫu Nhiên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .question-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .question-text {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .option-label {
            display: block;
            margin-bottom: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>📝 Bài Kiểm Tra Trắc Nghiệm Ngẫu Nhiên (<?php echo count($random_questions); ?> Câu)</h2>

    <form action="" method="POST">

        <?php foreach ($random_questions as $q): ?>
            <div class="question-box">
                <div class="question-text">
                    <?php echo $stt . '. ' . htmlspecialchars($q['question_text']); ?>
                </div>

                <?php foreach ($q['options'] as $key => $option_text): ?>
                    <label class="option-label">
                        <input type="radio"
                            name="q_<?php echo $q['id']; ?>"
                            value="<?php echo $key; ?>"
                            required>
                        <?php echo strtoupper($key) . ') ' . htmlspecialchars($option_text); ?>
                    </label>
                <?php endforeach; ?>

            </div>
        <?php
            $stt++;
        endforeach;
        ?>

        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Nộp Bài
        </button>

    </form>
</body>

</html>