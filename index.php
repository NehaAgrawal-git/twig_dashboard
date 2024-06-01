<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Initialize Twig
$loader = new FilesystemLoader(__DIR__ . '/template_files');
$twig = new Environment($loader);

$summaryJson = file_get_contents('jsons/summary.json');
$summaryData = json_decode($summaryJson, true);

$projectProgressJson = file_get_contents('jsons/Project_Progress_Summary.json');
$projectProgressData = json_decode($projectProgressJson, true);

$newItemsJson = file_get_contents('jsons/Whats_New.json');
$newItemData = json_decode($newItemsJson, true);

$latestActivityJson = file_get_contents('jsons/Latest_Activity.json');
$latestActivityData = json_decode($latestActivityJson, true);

$newProductsJson = file_get_contents('jsons/New_Products.json');
$newProductsData = json_decode($newProductsJson, true);

echo $twig->render('template.html', ['summaryData' => $summaryData['summary'],
                                    'projectProgressData' => $projectProgressData['project_progress_summary'],
                                    'newItemData' => $newItemData['what_new_items'],
                                    'latestActivityData' => $latestActivityData['latest_activity'],
                                    'newProductsData' => $newProductsData['new_products']
                                ]);
