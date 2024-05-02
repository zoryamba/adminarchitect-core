<?php

use Illuminate\Support\Facades\Route;

$pattern = '[a-z0-9\_\-]+';

// Dashboard
Route::get('/', [
    'as' => 'scaffold.dashboard',
    'uses' => 'DashboardController@index',
]);

// Search for a model
Route::get('search', [
    'as' => 'scaffold.search',
    'uses' => 'ScaffoldController@search',
])->where('module', $pattern);

// Index
Route::get('{module}', [
    'as' => 'scaffold.index',
    'uses' => 'ScaffoldController@index',
])->where('module', $pattern);

// Create new Item
Route::get('{module}/create', [
    'as' => 'scaffold.create',
    'uses' => 'ScaffoldController@create',
])->where('module', $pattern);

// Save new item
Route::post('{module}/create', 'ScaffoldController@store')->where('module', $pattern);

// View Item
Route::get('{module}/{id}', [
    'as' => 'scaffold.view',
    'uses' => 'ScaffoldController@view',
])->where('module', $pattern);

// Edit Item
Route::get('{module}/{id?}/edit', [
    'as' => 'scaffold.edit',
    'uses' => 'ScaffoldController@edit',
])->where('module', $pattern);

// Save Item
Route::post('{module}/{id?}/edit', [
    'as' => 'scaffold.update',
    'uses' => 'ScaffoldController@update',
])->where('module', $pattern);

// Delete Item
Route::get('{module}/{id}/delete', [
    'as' => 'scaffold.delete',
    'uses' => 'ScaffoldController@delete',
])->where('module', $pattern);

// Delete attachment
Route::get('{module}/{id}/delete/attachment/{attachment}', [
    'as' => 'scaffold.delete_attachment',
    'uses' => 'ScaffoldController@deleteAttachment',
])->where('module', $pattern);

Route::get('{module}/{id}/media', [
    'as' => 'scaffold.fetch_media',
    'uses' => 'ScaffoldController@fetchMedia',
])->where('module', $pattern);

// Upload media attachment
Route::post('{module}/{id}/media/{collection}', [
    'as' => 'scaffold.attach_media',
    'uses' => 'ScaffoldController@attachMedia',
])->where('module', $pattern);

// Upload media attachment
Route::delete('{module}/{id}/media/{mediaId}', [
    'as' => 'scaffold.detach_media',
    'uses' => 'ScaffoldController@detachMedia',
])->where('module', $pattern);

// Custom method
Route::get('{module}/{id}/{action}', [
    'as' => 'scaffold.action',
    'uses' => 'ScaffoldController@action',
])->where('module', $pattern);

// Custom batch method
Route::post('{module}/batch-action', [
    'as' => 'scaffold.batch',
    'uses' => 'BatchController@batch',
])->where('module', $pattern);

// Export collection url
Route::get('{module}.{format}', [
    'as' => 'scaffold.export',
    'uses' => 'BatchController@export',
])->where('module', $pattern);
