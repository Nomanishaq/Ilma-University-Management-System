<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1,
        .header h2 {
            margin: 5px 0;
        }

        .note {
            font-style: italic;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .question {
            text-align: left;
        }

        .obe-attainment {
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $quiz->title }}</h1>
        <h2>{{ $quiz->exam_type }} Examinations {{ $quiz->session ? $quiz->session->title : '-' }}</h2>
    </div>
    <p class="note">Note: Attempt all questions. Do not write anything on the paper.</p>

    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Marks</th>
                <th>OBE Attainment (C/P/An)<br>(CLO-n) (PLO-n)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quiz->questions as $index => $question)
                <tr>
                    <td class="question">
                        <strong>Part {{ chr(65 + $index) }})</strong> {{ $question['question'] }}
                        <br>
                        @if ($question->question_type == 'quiz_base')
                            @php $options = json_decode($question['options'], true); @endphp
                            @if ($options)
                                @foreach (['option_a', 'option_b', 'option_c', 'option_d'] as $key => $optionKey)
                                    @if (!empty($options[$optionKey]))
                                        <p><strong>{{ chr(65 + $key) }}.</strong> {{ $options[$optionKey] }}</p>
                                    @endif
                                @endforeach
                            @else
                                <p>No options available.</p>
                            @endif
                        @endif
                    </td>
                    <td>{{ $question['total_marks'] }}</td>
                    <td class="obe-attainment">
                        <p>CLO: {{ $question['clo'] ?? 'N/A' }}</p>
                        <p>PLO: {{ $question['plo'] ?? 'N/A' }}</p>
                        <p>Domains:
                            Cognitive ({{ $question['cognitive'] ?? 'N/A' }}),
                            Psychomotor ({{ $question['psychomotor'] ?? 'N/A' }}),
                            Affective ({{ $question['affective'] ?? 'N/A' }})
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
