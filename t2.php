<?php

$courseCatalog = [
    "courses" => [
        "COURSE-001" => [
            "title" => "Advanced Backend Architecture with Go & Rust",
            "slug" => "advanced-backend-go-rust",
            "instructor" => [
                "id" => "INST-99",
                "name" => "M. Chairul",
                "credentials" => [
                    "role" => "Lead Systems Architect",
                    "verified" => true
                ]
            ],
            "pricing" => [
                "base_price" => 1500000,
                "discount_percentage" => 20,
                "is_active" => true
            ],
            "curriculum" => [
                [
                    "module_id" => "MOD-1",
                    "module_title" => "Concurrency & Memory Management",
                    "lessons" => [
                        ["id" => "L-101", "title" => "Go Goroutines & Channels", "duration_min" => 45],
                        ["id" => "L-102", "title" => "Rust Ownership & Borrowing", "duration_min" => 60]
                    ]
                ],
                [
                    "module_id" => "MOD-2",
                    "module_title" => "High-Performance API Pipelines",
                    "lessons" => [
                        ["id" => "L-201", "title" => "Zero-Allocation Middleware", "duration_min" => 50],
                        ["id" => "L-202", "title" => "gRPC Integration", "duration_min" => 40]
                    ]
                ]
            ],
            "reviews" => [
                ["user" => "ari_w", "rating" => 5, "comment" => "Arsitektur kodenya solid."],
                ["user" => "dina_s", "rating" => 4, "comment" => "Materi Rust cukup padat."]
            ]
        ],
        "COURSE-002" => [
            "title" => "Enterprise Database Design & PostgreSQL Optimization",
            "slug" => "postgresql-optimization",
            "instructor" => [
                "id" => "INST-99",
                "name" => "M. Chairul",
                "credentials" => [
                    "role" => "Lead Systems Architect",
                    "verified" => true
                ]
            ],
            "pricing" => [
                "base_price" => 1200000,
                "discount_percentage" => 0,
                "is_active" => true
            ],
            "curriculum" => [
                [
                    "module_id" => "MOD-1",
                    "module_title" => "Indexing Deep Dive",
                    "lessons" => [
                        ["id" => "L-301", "title" => "B-Tree vs GIN & GiST", "duration_min" => 55],
                        ["id" => "L-302", "title" => "Partial & Expression Indexes", "duration_min" => 35]
                    ]
                ]
            ],
            "reviews" => [
                ["user" => "budi_t", "rating" => 5, "comment" => "Penjelasan index sangat aplikatif."]
            ]
        ]
    ]
]; ?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP 1 - 21Okt2026</title>
</head>
<body>
    <h1>Latihan PHP Tugas 2</h1>
    <table border="1px";>
        <tr>
            <th colspan="18">COURSE CATALOG</th>
        </tr>
        <tr>
            <th colspan="18">COURSES</th>
        </tr>
        <tr>
            <th rowspan="3">Course Code</th>
            <th rowspan="3">Title</th>
            <th rowspan="3">Slug</th>
            <th colspan="4">Instructor</th>
            <th colspan="3">Price</th>
            <th colspan="5">Curriculum</th>
            <th colspan="3" rowspan="2">Reviews</th>
        </tr>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Name</th>
            <th rowspan="2">Role</th>
            <th rowspan="2">Verified</th>
            <th rowspan="2">Price</th>
            <th rowspan="2">Discount</th>
            <th rowspan="2">Is Active</th>
            <th rowspan="2">Module</th>
            <th rowspan="2">Module Title</th>
            <th colspan="3">Lessons</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Duration</th>
            <th>User</th>
            <th>Rating</th>
            <th>Comment</th>
        </tr>
            <?php
            $a = $courseCatalog['courses'];
            
            foreach ($a as $courseId => $course) {
                
                $totalCuriculum = count($course['curriculum']);
                $totalLesson = 0;
                foreach($course['curriculum'] as $c) {
                    $totalLesson += count($c['lessons']);
                }
                $maxRowSpan = max($totalCuriculum, $totalLesson);
                //var_dump($maxRowSpan);
            ?>
            <tr>
                        <th <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $courseId; ?></th>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['title']; ?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['slug']; ?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['instructor']['id']; ?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['instructor']['name']; ?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['instructor']['credentials']['role'];?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['instructor']['credentials']['verified'] ? 'Yes' : 'No';?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['pricing']['base_price']; ?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['pricing']['discount_percentage'];?></td>
                        <td <?php if(count($course['curriculum']) > 0) { echo "rowspan=" . $maxRowSpan; } ?>><?php echo $course['pricing']['is_active'] ? 'Active' : 'Not';?></td>
                        

                    <?php
                    $nReview = 0;
                    $indexC = 0;
                    foreach ($course['curriculum'] as $module) { ?>

                        <td <?php if(count($module['lessons']) > 0) { echo "rowspan=" . count($module['lessons']); } ?> ><?php echo $module['module_id']; ?></td>
                        <td <?php if(count($module['lessons']) > 0) { echo "rowspan=" . count($module['lessons']); } ?> ><?php echo $module['module_title']; ?></td>

                        <?php for($i = 0; $i < count($module['lessons']); $i++) { ?>

                        <td ><?php echo $module['lessons'][$i]['id'] ?></td>
                        <td ><?php echo $module['lessons'][$i]['title'] ?></td>
                        <td ><?php echo $module['lessons'][$i]['duration_min'] ?></td>

                        <?php if ($nReview == 0) { ?>
                        <td rowspan="<?php echo count($module['lessons']) ?>"><?php echo $course['reviews'][$indexC]['user'] ?></td>
                        <td rowspan="<?php echo count($module['lessons']) ?>"><?php echo $course['reviews'][$indexC]['rating'] ?></td>
                        <td rowspan="<?php echo count($module['lessons']) ?>"><?php echo $course['reviews'][$indexC]['comment'] ?></td>
                        <?php $nReview++; $indexC++;} ?>
            </tr>
                        <?php  } ?>
            
                    <?php $nReview = 0;} ?>
                
            <?php } ?>
    </table>