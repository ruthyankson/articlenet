
    <div class="container">
        <span class="centered"><h2>Articles</h2></span>
        <button class="btn btn-primary" data-toggle="modal" data-target="#articleModal" onclick="openModal('create')">Add New Article</button>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Writer</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 1;
                foreach ($articles as $article): ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= $article['title'] ?></td>
                        <td><?= $article['body'] ?></td>
                        <td><?= $article['writer'] ?></td>
                        <td><?= date('d/m/Y', strtotime($article['created_at'])) ?></td>
                        <td>
                            <?= view('partials/action_buttons', ['article' => $article]) ?>                        
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

 