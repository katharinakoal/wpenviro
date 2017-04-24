<?php if( have_rows('faqs') ): $index = 0; ?>

    <br><br>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <?php while ( have_rows('faqs') ) : the_row(); ?>

            <?php $section = sprintf("section_%s", ++$index); ?>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $section; ?>">
                             <?php the_sub_field('question'); ?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo $section; ?>" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        <?php the_sub_field('answer'); ?>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>