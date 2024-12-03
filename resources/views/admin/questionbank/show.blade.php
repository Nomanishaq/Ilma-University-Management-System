<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function printDiv(divId) {
            // Get the div's HTML content
            var content = document.getElementById(divId).innerHTML;

            // Create a new window or frame
            var printWindow = window.open('', '_blank');

            // Add styles and content to the new window
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                    <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                       
                        <!-- Add any custom styles -->
                        <style>
                            body { font-family: Arial, sans-serif; margin: 20px; }
                            .border-dark { border-color: #000 !important; }
                            .border-3 { border-width: 3px !important; }
                            .w-25 { width: 25% !important; }
                            .fs-5 { font-size: 1.25rem !important; }
                            .fs-6 { font-size: 1rem !important; }
                            .text-center { text-align: center !important; }
                            .text-end { text-align: end !important; }
                            
                        </style>
                        <title>Print Preview</title>
                        <style>
                            body { font-family: Arial, sans-serif; margin: 20px; }
                        </style>
                    </head>
                    <body>

                        ${content}
                    </body>
                </html>
            `);
            printWindow.document.close();

            // Trigger the print
            printWindow.print();

            // Close the window after printing
            printWindow.onafterprint = () => printWindow.close();
        }
    </script>
    <style>
        p{
            margin: 0 !important;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button class="btn btn-primary" onclick="printDiv('paper')">Print</button>
            </div>
        </div>
    </div>


    <div class="container py-2" id="paper" style="max-width: 90%;">

        <div class="row gy-2">
            <div class="col-12 text-center">
                <img src="/uploads/setting/ilma_uni_1732311944.png" class="img-fluid w-25" alt="">
            </div>

            <div class="col-12 text-center pt-3">
                <h3 class="fs-5"> {{ $quiz->title }}</h3>
            </div>
            <div class="col-12">
            <h4 class="fs-5 text-center">
                    @if($quiz->exam_type == "quiz")
                        Quiz
                    @elseif($quiz->exam_type == "mid_term")
                        Mid Term Examination
                    @elseif($quiz->exam_type == "final_term")
                    Final Term Examination
                    @elseif($quiz->exam_type == "assignment")
                    Assignment
                    @elseif($quiz->exam_type == "class_participation")
                    Class participation
                    @endif

                </b> </h4>
            </div>

            <div class="col-6">
                <h4 class="fs-6">COURSE CODE: <b>{{ $quiz->subject?->code ?? 'Please select' }}                </b></h4>
            </div>


            <div class="col-6 text-center">
                @php
                    $questions = json_decode($quiz->questions, true);
                    $totalMarks = collect($questions)->sum('total_marks');
                @endphp
                <h4 class="fs-6">MAX MARKS: <b>{{ $totalMarks }}</b></h4>
            </div>


            <div class="col-6">
                <h4 class="fs-6">TIME ALLOWED: <b>{{ $quiz->exam_time }}</b></h4>
            </div>


            <div class="col-6 text-center">
                <h4 class="fs-6">CAMPUS: <b>MAIN</b> </h4>
            </div>
            <div class="col-6">
                <h4 class="fs-6">Teacher: <b>{{ $quiz->teacher }}</b> </h4>
            </div>


        </div>

        <div class="row py-2">
            <div class="col-12 text-center">
                <p class="border border-dark border-2 fs-6"><b>Note:</b> Attempt all questions. Do not write anything on the paper.</p>
            </div>
        </div>


        <table class="table border border-dark border-2 table-striped-columns" border="1">
            <thead class="text-center">
                <tr>
                    <th>Question</th>
                    <th>Marks</th>
                    <th>OBE Attainment /
                        (C/P/An) /
                        (CLO-n) /
                        (PLO-n)
                    </th>
                </tr>

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
                <td class="text-center">{{ $question['total_marks'] }}</td>
                <td class="obe-attainment text-center">
                    <p>CLO: {{ isset($question['clo']) ? implode(', ', $question['clo']) : 'N/A' }}</p>
                    <p>PLO: {{ isset($question['plo']) ? implode(', ', $question['plo']) : 'N/A' }}</p>
                    <p>Domains:
                        Cognitive {{ isset($question['cognitive']) ? implode(', ', $question['cognitive']) : 'N/A' }},
                        Psychomotor {{ isset($question['psychomotor']) ? implode(', ', $question['psychomotor']) : 'N/A' }},
                        Affective {{ isset($question['affective']) ? implode(', ', $question['affective']) : 'N/A' }}
                    </p>
                </td>
            </tr>
            @endforeach


            </tbody>




            </thead>
        </table>

    </div>

</body>

</html>
