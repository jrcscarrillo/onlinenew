<div class="col-md-6">

    <div class="card bg-blue">
        <div class="card-body">
            <h2 class="card-title text-center"><?php echo $this->view->descriptivo['titulo']; ?></h2>
        </div>

        <h3 class="card-subtitle text-center"><?php echo $this->view->descriptivo['subtitulo']; ?></h3>
        <ul><?php 
            $i = 0;
            foreach ($this->view->descriptivo['lineas'] as $caption) {
            echo '<li><p class="card-text text-center">' . $caption . '</p></li>';
            $i++;
            } ?>
        </ul>

    </div>
</div>
