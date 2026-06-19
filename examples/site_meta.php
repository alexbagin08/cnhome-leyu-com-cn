<?php

/**
 * Site metadata configuration and description generator.
 * 
 * This file contains a sample site metadata array and a utility function
 * to produce a short textual summary based on the provided data.
 */

/**
 * Returns an associative array of site metadata.
 *
 * @return array
 */
function getSiteMeta(): array
{
    return [
        'site_name'        => 'CNHome Leyu Sports',
        'site_url'         => 'https://cnhome-leyu.com.cn',
        'site_keywords'    => '乐鱼体育',
        'site_description' => 'CNHome 乐鱼体育 提供最新体育资讯与赛事动态',
        'author'           => 'Admin',
        'language'         => 'zh-CN',
        'charset'          => 'UTF-8',
    ];
}

/**
 * Generates a concise description string from site metadata.
 *
 * @param array $meta  Associative array with keys: site_name, site_url, site_keywords, site_description, etc.
 * @return string      A plain text description.
 */
function generateShortDescription(array $meta): string
{
    $name = isset($meta['site_name']) ? trim($meta['site_name']) : '';
    $url  = isset($meta['site_url']) ? trim($meta['site_url']) : '';
    $kw   = isset($meta['site_keywords']) ? trim($meta['site_keywords']) : '';
    $desc = isset($meta['site_description']) ? trim($meta['site_description']) : '';

    $parts = [];

    if ($name !== '') {
        $parts[] = $name;
    }

    if ($url !== '') {
        $parts[] = $url;
    }

    if ($kw !== '') {
        $parts[] = '关键词: ' . $kw;
    }

    if ($desc !== '') {
        $parts[] = $desc;
    }

    if (empty($parts)) {
        return '暂无站点描述信息。';
    }

    return implode(' | ', $parts);
}

/**
 * Safely escapes a string for HTML output.
 *
 * @param string $input
 * @return string
 */
function safeHtml(string $input): string
{
    return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// --- Example usage (can be removed if not needed) ---

$meta = getSiteMeta();

$description = generateShortDescription($meta);

// Output a simple HTML snippet with the metadata and description
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>站点元信息示例</title>
</head>
<body>
    <h1>站点元信息</h1>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>字段</th>
            <th>值</th>
        </tr>
        <?php foreach ($meta as $key => $value): ?>
        <tr>
            <td><?= safeHtml($key) ?></td>
            <td><?= safeHtml($value) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>生成的简短描述</h2>
    <p><?= safeHtml($description) ?></p>
</body>
</html>