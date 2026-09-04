<?php require "headerLayout.php";
    $items = glob('*', GLOB_ONLYDIR);
    $ignoredFolders = ['.git', 'assets', 'vendor', 'includes'];
?>
<div class="container">
        <h1>My Projects</h1>

        <div class="project-grid">
            <?php
            $count = 0;
            foreach ($items as $folder) {
                if (in_array($folder, $ignoredFolders)) {
                    continue;
                }

                $displayName = ucwords(str_replace(['_', '-'], ' ', $folder));
                
                echo '<a href="' . htmlspecialchars($folder) . '/" class="project-card">';
                echo '  <span class="folder-icon">📁</span>';
                echo '  <span class="project-title">' . htmlspecialchars($displayName) . '</span>';
                echo '</a>';
                
                $count++;
            }

            if ($count === 0) {
                echo '<p class="empty-msg">No project folders found.</p>';
            }
            ?>
        </div>
    </div>
<?php require "footerLayout.php"?>