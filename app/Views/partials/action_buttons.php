<div class="action-buttons" style="display: flex; gap: 10px;">
                                
    <a href="/articles/<?= $article['slug'] ?>" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <button class="btn btn-warning" data-toggle="modal" data-target="#articleModal" onclick="openModal('edit', <?= $article['id'] ?>, '<?= addslashes($article['title']) ?>', '<?= addslashes($article['body']) ?>', '<?= addslashes($article['writer']) ?>')">
        <i class="fas fa-edit"></i>
    </button>

    <button type="button" class="btn btn-danger delete-btn" data-url="/articles/delete/<?= $article['id'] ?>">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>