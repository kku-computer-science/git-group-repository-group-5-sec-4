<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Published_research_detail')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.Published_research_description')); ?></p>
                <div class="row mt-3">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_title')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_name); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_abstract')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->abstract); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_keyword')); ?></b></p>
                    <p class="card-text col-sm-9">
                        <?php echo e($paper->keyword); ?>

                    </p>


                    <!-- <p class="card-text col-sm-9"><?php echo e($paper->keyword); ?></p> -->
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_journalType')); ?></b></p>
                    <p class="card-text col-sm-9">
                        <?php if(App::getLocale() == 'th'): ?>
                            <?php if($paper->paper_type == 'Journal'): ?>
                                <?php echo e(trans('message.Published_research_journal')); ?>

                            <?php elseif($paper->paper_type == 'Conference Proceeding'): ?>
                                <?php echo e(trans('message.Published_research_conference')); ?>

                            <?php elseif($paper->paper_type == 'Book Series'): ?>
                                <?php echo e(trans('message.Published_research_book_series')); ?>

                            <?php elseif($paper->paper_type == 'Book'): ?>
                                <?php echo e(trans('message.Published_research_book')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'en'): ?>
                            <?php if($paper->paper_type == 'Journal'): ?>
                                <?php echo e(trans('message.Published_research_journal')); ?>

                            <?php elseif($paper->paper_type == 'Conference Proceeding'): ?>
                                <?php echo e(trans('message.Published_research_conference')); ?>

                            <?php elseif($paper->paper_type == 'Book Series'): ?>
                                <?php echo e(trans('message.Published_research_book_series')); ?>

                            <?php elseif($paper->paper_type == 'Book'): ?>
                                <?php echo e(trans('message.Published_research_book')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'cn'): ?>
                            <?php if($paper->paper_type == 'Journal'): ?>
                                <?php echo e(trans('message.Published_research_journal')); ?>

                            <?php elseif($paper->paper_type == 'Conference Proceeding'): ?>
                                <?php echo e(trans('message.Published_research_conference')); ?>

                            <?php elseif($paper->paper_type == 'Book Series'): ?>
                                <?php echo e(trans('message.Published_research_book_series')); ?>

                            <?php elseif($paper->paper_type == 'Book'): ?>
                                <?php echo e(trans('message.Published_research_book')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_documentType')); ?></b></p>
                    <p class="card-text col-sm-9">
                        <?php if(App::getLocale() == 'th'): ?>
                            <?php if($paper->paper_subtype == 'Article'): ?>
                                <?php echo e(trans('message.Published_research_document_type_article')); ?>

                            <?php elseif($paper->paper_subtype == 'Conference Paper'): ?>
                                <?php echo e(trans('message.Published_research_document_type_conference')); ?>

                            <?php elseif($paper->paper_subtype == 'Editorial'): ?>
                                <?php echo e(trans('message.Published_research_document_type_editorial')); ?>

                            <?php elseif($paper->paper_subtype == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_document_type_bookchapter')); ?>

                            <?php elseif($paper->paper_subtype == 'Erratum'): ?>
                                <?php echo e(trans('message.Published_research_document_type_erratum')); ?>

                            <?php elseif($paper->paper_subtype == 'Review'): ?>
                                <?php echo e(trans('message.Published_research_document_type_review')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'en'): ?>
                            <?php if($paper->paper_subtype == 'Article'): ?>
                                <?php echo e(trans('message.Published_research_document_type_article')); ?>

                            <?php elseif($paper->paper_subtype == 'Conference Paper'): ?>
                                <?php echo e(trans('message.Published_research_document_type_conference')); ?>

                            <?php elseif($paper->paper_subtype == 'Editorial'): ?>
                                <?php echo e(trans('message.Published_research_document_type_editorial')); ?>

                            <?php elseif($paper->paper_subtype == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_document_type_bookchapter')); ?>

                            <?php elseif($paper->paper_subtype == 'Erratum'): ?>
                                <?php echo e(trans('message.Published_research_document_type_erratum')); ?>

                            <?php elseif($paper->paper_subtype == 'Review'): ?>
                                <?php echo e(trans('message.Published_research_document_type_review')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'cn'): ?>
                            <?php if($paper->paper_subtype == 'Article'): ?>
                                <?php echo e(trans('message.Published_research_document_type_article')); ?>

                            <?php elseif($paper->paper_subtype == 'Conference Paper'): ?>
                                <?php echo e(trans('message.Published_research_document_type_conference')); ?>

                            <?php elseif($paper->paper_subtype == 'Editorial'): ?>
                                <?php echo e(trans('message.Published_research_document_type_editorial')); ?>

                            <?php elseif($paper->paper_subtype == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_document_type_bookchapter')); ?>

                            <?php elseif($paper->paper_subtype == 'Erratum'): ?>
                                <?php echo e(trans('message.Published_research_document_type_erratum')); ?>

                            <?php elseif($paper->paper_subtype == 'Review'): ?>
                                <?php echo e(trans('message.Published_research_document_type_review')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_publication')); ?></b></p>
                    <p class="card-text col-sm-9">
                        <?php if(App::getLocale() == 'th'): ?>
                            <?php if($paper->publication == 'International Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_journal')); ?>

                            <?php elseif($paper->publication == 'International Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_book')); ?>

                            <?php elseif($paper->publication == 'International Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_conference')); ?>

                            <?php elseif($paper->publication == 'National Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_conference')); ?>

                            <?php elseif($paper->publication == 'National Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_journal')); ?>

                            <?php elseif($paper->publication == 'National Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_book')); ?>

                            <?php elseif($paper->publication == 'National Magazine'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_magazine')); ?>

                            <?php elseif($paper->publication == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_publication_book_chapter')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'en'): ?>
                            <?php if($paper->publication == 'International Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_journal')); ?>

                            <?php elseif($paper->publication == 'International Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_book')); ?>

                            <?php elseif($paper->publication == 'International Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_conference')); ?>

                            <?php elseif($paper->publication == 'National Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_conference')); ?>

                            <?php elseif($paper->publication == 'National Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_journal')); ?>

                            <?php elseif($paper->publication == 'National Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_book')); ?>

                            <?php elseif($paper->publication == 'National Magazine'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_magazine')); ?>

                            <?php elseif($paper->publication == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_publication_book_chapter')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'cn'): ?>
                            <?php if($paper->publication == 'International Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_journal')); ?>

                            <?php elseif($paper->publication == 'International Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_book')); ?>

                            <?php elseif($paper->publication == 'International Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_international_conference')); ?>

                            <?php elseif($paper->publication == 'National Conference'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_conference')); ?>

                            <?php elseif($paper->publication == 'National Journal'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_journal')); ?>

                            <?php elseif($paper->publication == 'National Book'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_book')); ?>

                            <?php elseif($paper->publication == 'National Magazine'): ?>
                                <?php echo e(trans('message.Published_research_publication_national_magazine')); ?>

                            <?php elseif($paper->publication == 'Book Chapter'): ?>
                                <?php echo e(trans('message.Published_research_publication_book_chapter')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </p>

                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_author')); ?></b></p>
                    <p class="card-text col-sm-9">

                        <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 1): ?>
                                <b><?php echo e(trans('message.Published_research_first_author')); ?>:</b>
                                <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 1): ?>
                                <b><?php echo e(trans('message.Published_research_first_author')); ?>:</b> <?php echo e($teacher->fname_en); ?>

                                <?php echo e($teacher->lname_en); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 2): ?>
                                <b><?php echo e(trans('message.Published_research_co_author')); ?>:</b> <?php echo e($teacher->author_fname); ?>

                                <?php echo e($teacher->author_lname); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 2): ?>
                                <b><?php echo e(trans('message.Published_research_co_author')); ?>:</b> <?php echo e($teacher->fname_en); ?>

                                <?php echo e($teacher->lname_en); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 3): ?>
                                <b><?php echo e(trans('message.Published_research_corresponding_author')); ?>:</b>
                                <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($teacher->pivot->author_type == 3): ?>
                                <b><?php echo e(trans('message.Published_research_corresponding_author')); ?>:</b>
                                <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    </p>
                </div>

                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_journalName')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_sourcetitle); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_year')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_yearpub); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_volume')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_volume); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_issue')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_issue); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_page')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_page); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_doi')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($paper->paper_doi); ?></p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Published_research_url')); ?></b></p>
                    <a href="<?php echo e($paper->paper_url); ?>" target="_blank"
                        class="card-text col-sm-9"><?php echo e($paper->paper_url); ?></a>
                </div>

                <a class="btn btn-primary mt-5" href="<?php echo e(route('papers.index')); ?>">
                    <?php echo e(trans('message.Back_button')); ?></a>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/papers/show.blade.php ENDPATH**/ ?>