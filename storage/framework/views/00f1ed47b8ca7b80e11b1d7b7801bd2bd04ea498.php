<?php $__env->startSection('content'); ?>
    <div class="row">

        <?php if(request()->route('slug') == 'ai-images'): ?>
        <?php if(env('Environment') == 'sendbox'): ?> <p class="text-danger mb-2">Due to demo mode we have disabled image generation features.</p> <?php endif; ?>
        <?php endif; ?>
        <div class="<?php if(request()->route('slug') != 'artical-generator-pro'): ?> col-lg-4 col-md-12 <?php else: ?>  col-lg-12 col-md-12 <?php endif; ?>">
            <form class="card border-0 shadow p-3 h-100">

                <input type="hidden" value="<?php echo e(request()->route('slug')); ?>" id="slug">
                <input type="hidden" value="<?php echo e(@$gettoolingo->id); ?>" id="tool_id">

                <?php if(request()->route('slug') == 'content-writer'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="inputCity" class="form-label"><?php echo e(trans('labels.primary_keyword')); ?></label>
                        <input type="text" class="form-control" placeholder="به عنوان مثال، انتشار برنامه ما" id="keyword">
                    </div>
                <?php elseif(request()->route('slug') == 'instagram-assistant'): ?>

                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                             height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>

                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>

                    <div class="col-12 mt-2">
                        <label for="topic" class="form-label"><?php echo e(trans('labels.section_topic')); ?></label>
                        <textarea class="form-control" id="topic" rows="3"
                                  placeholder="نقش نویسندگان هوش مصنوعی در آینده کپی رایتینگ"></textarea>
                    </div>

                <?php elseif(request()->route('slug') == 'artical-generator'): ?>

                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>

                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>

                    <div class="col-12 mt-2">
                        <label for="topic" class="form-label"><?php echo e(trans('labels.section_topic')); ?></label>
                        <textarea class="form-control" id="topic" rows="3"
                            placeholder="نقش نویسندگان هوش مصنوعی در آینده کپی رایتینگ"></textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="blog_section_keyword" class="form-label"><?php echo e(trans('labels.section_keywords')); ?></label>
                        <textarea class="form-control" rows="3" id="blog_section_keyword"
                            placeholder="مولد وبلاگ، بهترین نرم افزار نوشتن"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'artical-generator-pro'): ?>

                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>

                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>

                    <p class=" fs-7 mt-1 text-danger" id="ai_type_gpt3_5_description"><?php echo e(trans('labels.ai_type_gpt3_5_description')); ?></p>

                    <div class="col-12 mt-2">
                        <label for="topic" class="form-label"><?php echo e(trans('labels.section_topic')); ?></label>
                        <textarea class="form-control" id="topic" rows="3"
                            placeholder="نقش نویسندگان هوش مصنوعی در آینده کپی رایتینگ"></textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="blog_section_keyword" class="form-label"><?php echo e(trans('labels.section_keywords')); ?></label>
                        <textarea class="form-control" rows="3" id="blog_section_keyword"
                            placeholder="مولد وبلاگ، بهترین نرم افزار نوشتن"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'business-idea'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="bidea_intrest" class="form-label"><?php echo e(trans('labels.intrest')); ?></label>
                        <input type="text" class="form-control" id="bidea_intrest" placeholder="بازاریابی">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="bidea_skill" class="form-label"><?php echo e(trans('labels.skills')); ?></label>
                        <textarea class="form-control" id="bidea_skill" rows="3"
                            placeholder="کپی رایتینگ، بازاریابی، توسعه محصول، هوش مصنوعی"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'cover-latter'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"> <?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="job_role" class="form-label"><?php echo e(trans('labels.job_role')); ?></label>
                        <input type="text" class="form-control" id="job_role" placeholder="بازاریاب دیجیتال">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="job_skills" class="form-label"><?php echo e(trans('labels.job_skills')); ?></label>
                        <input type="text" class="form-control" id="job_skills"
                            placeholder="blog writing, SEO, social media, email">
                    </div>
                <?php elseif(request()->route('slug') == 'social-post-business'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="social_product_name" class="form-label"><?php echo e(trans('labels.product_name')); ?></label>
                        <input type="text" class="form-control" id="social_product_name" placeholder="...">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="social_product_desc"
                            class="form-label"><?php echo e(trans('labels.product_description')); ?></label>
                        <textarea class="form-control" id="social_product_desc" rows="6"
                            placeholder=""></textarea>
                    </div>


                <?php elseif(request()->route('slug') == 'google-ads'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="google_product_name" class="form-label"><?php echo e(trans('labels.product_name')); ?></label>
                        <input type="text" class="form-control" id="google_product_name" placeholder="...">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="google_product_desc"
                            class="form-label"><?php echo e(trans('labels.product_description')); ?></label>
                        <textarea class="form-control" id="google_product_desc" rows="6"
                            placeholder=""></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="google_keyword" class="form-label"><?php echo e(trans('labels.target_keyword')); ?></label>
                        <input type="text" class="form-control" id="google_keyword" placeholder="Content Writing">
                    </div>
                <?php elseif(request()->route('slug') == 'social-post-personal'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-12 mt-2">
                        <label for="post_topic" class="form-label"><?php echo e(trans('labels.post_topic')); ?></label>
                        <textarea class="form-control" id="post_topic" rows="3"
                            placeholder="الهام بخشیدن به اعضای جامعه برای به اشتراک گذاشتن نظرات و ایده های خود ..."></textarea>
                    </div>

                <?php elseif(request()->route('slug') == 'product-description'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"> <?php echo e(@$gettoolingo->name); ?> </p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="pdesc_name" class="form-label"><?php echo e(trans('labels.product_name')); ?></label>
                        <input type="text" class="form-control" id="pdesc_name" placeholder="...">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="pdesc_description" class="form-label"><?php echo e(trans('labels.about_product')); ?></label>
                        <textarea class="form-control" id="pdesc_description" rows="5"
                            placeholder=""></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'meta-description'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-12 mt-2">
                        <label for="seo_meta_title" class="form-label"><?php echo e(trans('labels.page_meta_title')); ?></label>
                        <textarea class="form-control" id="seo_meta_title" rows="3"
                            placeholder="بهترین نویسنده هوش مصنوعی، تولید کننده محتوا و دستیار نوشتن"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'meta-title'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="seo_title_keyword" class="form-label"><?php echo e(trans('labels.target_keyword')); ?></label>
                        <input type="text" class="form-control" id="seo_title_keyword" placeholder="نوشتن محتوا">
                    </div>
                <?php elseif(request()->route('slug') == 'video-description'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"> <?php echo e(@$gettoolingo->name); ?> </p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-12 mt-2">
                        <label for="video_title" class="form-label"><?php echo e(trans('labels.video_title')); ?></label>
                        <textarea class="form-control" id="video_title" rows="3"
                            placeholder="نحوه استفاده از نویسندگان هوش مصنوعی برای ایجاد وبلاگ های با کیفیت بالا در چند دقیقه"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'video-idea'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"> <?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="video_keyword" class="form-label"><?php echo e(trans('labels.keyword')); ?></label>
                        <input type="text" class="form-control" id="video_keyword"
                            placeholder="دستیاران نوشتن هوش مصنوعی">
                    </div>
                <?php elseif(request()->route('slug') == 'long-form'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-12 mt-2">
                        <label for="topic" class="form-label"><?php echo e(trans('labels.content_topic')); ?></label>
                        <textarea class="form-control" id="topic" rows="3"
                            placeholder="فواید مدیتیشن برای سلامت روان"></textarea>
                    </div>
                <?php elseif(request()->route('slug') == 'factual-answer'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="factualquestions" class="form-label"><?php echo e(trans('labels.question')); ?></label>
                        <input type="text" class="form-control" placeholder="به عنوان مثال، هوش مصنوعی چیست؟" id="factualquestions">
                    </div>
                <?php elseif(request()->route('slug') == 'interview-questions'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="questiontopic" class="form-label"><?php echo e(trans('labels.topic')); ?></label>
                        <input type="text" class="form-control" placeholder="به عنوان مثال: بازاریابی کسب و کار" id="questiontopic">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="numberofquestion" class="form-label"><?php echo e(trans('labels.no_of_questions')); ?></label>
                        <input type="number" class="form-control" min="0" max="10" name="numberofquestion" id="numberofquestion" value="1">
                    </div>
                <?php elseif(request()->route('slug') == 'review-creator'): ?>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(helper::image_path(@$gettoolingo->id . '.svg')); ?>" class="img-fluid rounded-circle"
                            height="35" width="35" alt="">
                        <p class="p-font text-dark mx-2"><?php echo e(@$gettoolingo->name); ?></p>
                    </div>
                    <p class="text-muted fs-7 mt-1"><?php echo e(@$gettoolingo->description); ?></p>
                    <div class="col-md-12 mt-2">
                        <label for="reviewname" class="form-label"><?php echo e(trans('labels.name')); ?></label>
                        <input type="text" class="form-control" placeholder="به عنوان مثال: موضوع بررسی" id="reviewname">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="review_keyword" class="form-label"><?php echo e(trans('labels.keyword')); ?></label>
                        <textarea class="form-control" rows="3" id="review_keyword"
                            placeholder="رنگ زیبا، ظاهر زیبا، سرعت متوسط خوب"></textarea>
                    </div>
                <?php endif; ?>
                <?php if(request()->route('slug') != 'ai-images' and request()->route('slug') != 'instagram-assistant'): ?>
                <div class="col-12 mt-2">
                    <label for="languages" class="form-label"><?php echo e(trans('labels.languages')); ?> </label>
                    <select id="languages" class="form-select">
                        <?php $__currentLoopData = helper::multi_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($languages); ?>"><?php echo e($languages); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php endif; ?>
                <?php if(request()->route('slug') != 'long-form' && request()->route('slug') != 'factual-answer' && request()->route('slug') != 'interview-questions' && request()->route('slug') != 'ai-images' && request()->route('slug') != 'artical-generator-pro' && request()->route('slug') != 'instagram-assistant'): ?>
                <div class="col-12 mt-2">
                    <label for="variants" class="form-label"><?php echo e(trans('labels.number_of_variants')); ?></label>
                    <select class="form-select" id="variants">
                        <option value="1"><?php echo e(trans('labels.variants')); ?> 1</option>
                        <option value="2"><?php echo e(trans('labels.variants')); ?> 2</option>
                        <option value="3"><?php echo e(trans('labels.variants')); ?> 3</option>
                        <option value="4"><?php echo e(trans('labels.variants')); ?> 4</option>
                        <option value="5"><?php echo e(trans('labels.variants')); ?> 5</option>
                        <option value="6"><?php echo e(trans('labels.variants')); ?> 6</option>
                    </select>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php if(request()->route('slug') != 'ai-images' and request()->route('slug') != 'artical-generator-pro'): ?>

                    <div class="col-6 mt-2">
                        <label for="level" class="form-label"><?php echo e(trans('labels.creativity_level')); ?> </label>
                        <select id="level" class="form-select">
                            <option value="Default"><?php echo e(trans('labels.Default')); ?></option>
                            <option value="Creative"><?php echo e(trans('labels.Creative')); ?></option>
                            <option value="Colloquial"><?php echo e(trans('labels.Colloquial')); ?></option>
                            <option value="Intimate"><?php echo e(trans('labels.Intimate')); ?></option>
                            <option value="Official"><?php echo e(trans('labels.Official')); ?></option>
                        </select>
                    </div>
                        <div class="col-6 mt-2">
                        <div class="form-check" style="padding-left: 0;padding-right: 1.5em;margin-top: 38px;">
                            <input class="form-check-input" type="checkbox" value="" id="EmptyBox" style="float: right;margin-right: -1.5em;">
                            <label class="form-check-label" for="EmptyBox">
                                <?php echo e(trans('labels.EmptyBox')); ?>

                            </label>
                        </div>
                        </div>
                    <?php endif; ?>
                        <?php if(request()->route('slug') != 'ai-images' and request()->route('slug') != 'artical-generator-pro' and request()->route('slug') != 'instagram-assistant'): ?>
                    <div class="col-6 mt-2">
                        <label for="max_result_length" class="form-label"><?php echo e(trans('labels.max_result_length')); ?> <i
                                class="fa-sharp fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="<?php echo e(helper::wordcount(Auth::user()->id).' '.trans('labels.maximum_word_limit')); ?>"></i></label>
                        <input type="number" class="form-control" min="0" max="<?php echo e(helper::wordcount(Auth::user()->id)); ?>"
                            name="max_result_length" id="max_result_length" value="200">

                    </div>

                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="form-check" style="padding-left: 0;padding-right: 1.5em">
                            <input class="form-check-input" type="checkbox" value="1" id="createImage" style="float: right;margin-right: -1.5em;">
                            <label class="form-check-label" for="createImage">
                                <?php echo e(trans('labels.createImage')); ?>

                            </label>
                        </div>
                    </div>
                </div>


                <?php if(request()->route('slug') == 'ai-images'): ?>
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(helper::image_path(17 . '.svg')); ?>" class="img-fluid rounded-circle"
                        height="35" width="35" alt="">
                    <p class="p-font text-dark mx-2"><?php echo e(trans('labels.ai_images')); ?></p>
                </div>
                <p class="text-muted fs-7 mt-1"><?php echo e(trans('labels.img_tool_description')); ?></p>
                <div class="col-12 mt-2">
                    <label for="image_topic" class="form-label"><?php echo e(trans('labels.topic')); ?></label>
                    <textarea class="form-control" id="image_topic" rows="3" placeholder="به هوش مصنوعی بگویید چه چیزی ایجاد کند. از انگلیسی به عنوان زبان ورودی استفاده کنید."></textarea>
                </div>
                <div class="col-12 mt-2">
                    <label for="topic" class="form-label"><?php echo e(trans('labels.size')); ?></label>
                    <select id="image_size" class="form-select">
                        <option value="256x256">256x256</option>
                        <option value="512x512">512x512</option>
                        <option value="1024x1024">1024x1024</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="no_of_images" class="form-label"><?php echo e(trans('labels.no_of_images')); ?></label>
                    <input type="number" class="form-control" min="1" max="10" name="no_of_images" id="no_of_images" value="1">
                </div>
                <?php endif; ?>


                <div class="col-md-12 mt-4">
                    <div class="input-group mb-3">
                        <button type="button"
                            class="btn <?php echo e(session()->get('theme') == 'dark' ? 'btn-dark-theme' : 'btn-primary'); ?> w-100" id="btngenerate" ><?php echo e(trans('labels.generate')); ?></button>
                        <!-- <a href="<?php echo e(URL::to('content-' . request()->route('slug'))); ?>"><span class="input-group-text"> <i
                                        class="fa-light fa-arrows-retweet"></i></span></a> -->
                    </div>
                </div>
            </form>

        </div>

        <?php if(request()->route('slug') != 'ai-images' and request()->route('slug') != 'artical-generator-pro'): ?>
        <div class="col-lg-8 col-md-12 d-lg-flex mt-3 mt-lg-0 mt-xl-0 mt-xxl-0">
            <div class="card border-0 shadow h-100 w-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="p-font text-dark"><i class="fa-solid fa-notes"></i>
                            <?php echo e(trans('labels.generated_result')); ?></p>
                        <div>
                            <a href="<?php echo e(URL::to('/generatewordfile')); ?>"><i class="fa-solid fa-file-word text-muted mx-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(trans('labels.generate_wordfile')); ?>"></i></a>
                            <a href="<?php echo e(URL::to('/generatepdf')); ?>"> <i class="fa-solid fa-file-pdf text-muted mx-1"
                                    id="pdf" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(trans('labels.generate_pdf')); ?>"></i> </a>
                            <a href="javascript:void(0)"> <i class="fa-solid fa-copy text-muted mx-1" id="copybtn"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(trans('labels.copy')); ?>"></i></a>
                            <i class="fa-solid fa-floppy-disk text-muted mx-1 d-none" id="content_save"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('labels.save')); ?>"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <textarea class="form-control" id="ckeditor" class="h-100" name="ckeditor"></textarea>
                </div>
            </div>
        </div>
        <?php elseif(request()->route('slug') == 'ai-images'): ?>
        <div class="col-lg-8 col-md-12 d-lg-flex mt-3 mt-lg-0 mt-xl-0 mt-xxl-0">
            <div class="card border-0 shadow h-100 w-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="p-font text-dark"><i class="fa-solid fa-notes"></i>
                            <?php echo e(trans('labels.generated_result')); ?></p>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row" id="outputimage">

                    </div>

                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var contentcheckurl = "<?php echo e(URL::to('/savecontent')); ?>"
        var contenturl = "<?php echo e(URL::to('/generate')); ?>";
        var saveurl = "<?php echo e(URL::to('/content/save')); ?>";
        var generatelabels = "<?php echo e(trans('labels.generate')); ?>";
        var generateinglabels = "<?php echo e(trans('labels.generateing')); ?>";
        var pdfurl = "<?php echo e(URL::to('/generatepdf')); ?>";
        var max_tokens=<?php echo e(helper::wordcount(Auth::user()->id)); ?>;
    </script>
    <?php if(request()->route('slug') != 'ai-images'): ?>
        <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/editor.js')); ?>"></script>

    <?php endif; ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/content.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/content.blade.php ENDPATH**/ ?>