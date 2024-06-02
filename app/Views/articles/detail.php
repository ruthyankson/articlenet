<!-- Article details page -->
<div class="container">
    <h1><?= $article['title'] ?></h1>
    <p><strong>Writer:</strong> <?= $article['writer'] ?></p>
    <p><strong>Date:</strong> <?= date('d/m/Y', strtotime($article['created_at'])) ?></p>        
    <p><strong>Updated:</strong> <?= date('d/m/Y', strtotime($article['updated_at'])) ?></p>
    <hr>
    <p><?= $article['body'] ?></p>
    <hr>
    <div class="action-buttons">
        <button class="btn btn-warning" data-toggle="modal" data-target="#articleModal" onclick="openModal('edit', <?= $article['id'] ?>, '<?= addslashes($article['title']) ?>', '<?= addslashes($article['body']) ?>', '<?= addslashes($article['writer']) ?>')">
            <i class="fas fa-edit"></i> Edit
        </button>
        
        <button type="button" class="btn btn-danger delete-btn" data-url="/articles/delete/<?= $article['id'] ?>">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </div>
    <hr>
    <a href="/articles" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Back to Articles
    </a>
    <div class="pt-3"></div>
</div>

    