<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .options p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $quiz->title }}</h2>
        <p>Faculty: {{ $quiz->faculty->title ?? 'N/A' }}</p>
        <p>Program: {{ $quiz->program->title ?? 'N/A' }}</p>
        <p>Session: {{ $quiz->session->title ?? 'N/A' }}</p>
        <p>Semester: {{ $quiz->semester->title ?? 'N/A' }}</p>
        <p>Section: {{ $quiz->section->title ?? 'N/A' }}</p>
        <p>Subject: {{ $quiz->subject->title ?? 'N/A' }}</p>
        <p>Exam Type: {{ ucfirst($quiz->exam_type) }}</p>
        <p>Exam Time: {{ $quiz->exam_time }} hour(s)</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Options</th>
                <th>Marks</th>
                <th>CLO</th>
                <th>PLO</th>
                <th>Domains</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quiz->questions as $index => $question)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $question['question'] }}</td>
                    <td>
                        @if(!empty($question['options']))
                            @php $options = json_decode($question['options'], true); @endphp
                            <div class="options">
                                <p>A: {{ $options['option_a'] ?? 'N/A' }}</p>
                                <p>B: {{ $options['option_b'] ?? 'N/A' }}</p>
                                <p>C: {{ $options['option_c'] ?? 'N/A' }}</p>
                                <p>D: {{ $options['option_d'] ?? 'N/A' }}</p>
                            </div>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $question['total_marks'] }}</td>
                    <td>{{ $question['clo'] ?? 'N/A' }}</td>
                    <td>{{ $question['plo'] ?? 'N/A' }}</td>
                    <td>
                        <p>Cognitive: {{ $question['cognitive'] ?? 'N/A' }}</p>
                        <p>Psychomotor: {{ $question['psychomotor'] ?? 'N/A' }}</p>
                        <p>Affective: {{ $question['affective'] ?? 'N/A' }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
