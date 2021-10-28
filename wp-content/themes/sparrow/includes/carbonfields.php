<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function() {

    $id = Container::make('theme_options', pll__('Front page'))
        ->add_tab( pll__('Slider'), array( 
            Field::make('complex', 'home_page_slider', pll__('Slides'))
                ->add_fields( array( 
                    Field::make('text', 'title', pll__('Slider title'))
                        ->set_required(true),
                    Field::make('textarea', 'description', pll__('Slider description'))
                        ->set_required(true),
                    Field::make('image', 'image', pll__('Slider image'))
                        ->set_required(true),
                 ) )
         ) )
         ->add_tab(pll__('Skills block'), array( 
            Field::make('complex', 'skills_items', pll__('Skills'))
            ->add_fields( array( 
                Field::make('text', 'title', pll__('Skill title'))
                    ->set_required(true),
                Field::make('textarea', 'description', pll__('Skill descripion'))
                    ->set_required(true),
             ) )
          ) )
          ->add_tab( pll__('Twitter front page'), array( 
              Field::make('textarea', 'twitter_description', pll__('Twitter description')),
              Field::make('text', 'twitter_last', pll__('Date of last post on twitter')),
              Field::make('text', 'twitter_link', pll__('Twitter link')),
           ) )
           ->add_tab( pll__('Footer menu'), array( 
                Field::make('complex', 'footer_socials_menu', pll__('Footer menu items'))
                    ->add_fields( array( 
                        Field::make('text', 'link', pll__('Social link')),
                        Field::make('select', 'select', pll__('Select social'))
                            ->add_options( array( 
                                'fa-facebook'    => 'facebook',
                                'fa-twitter'     => 'twitter',
                                'fa-google-plus' => 'google plus',
                                'fa-linkedin'    => 'linkedin',
                                'fa-skype'       => 'skype',
                                'fa-rss'         => 'rss',
                             ) ),
                     ) )
            ) );
    

    Container::make( 'theme_options', pll__('Portfolio page') )
        ->set_page_parent($id)
        ->add_tab(pll__('Portfolio header'), array( 
            Field::make('text', 'portfolio_header_title', pll__('Portfolio title')),
            Field::make('textarea', 'portfolio_header_desc', pll__('Portfolio description')),
         ) )
         ->add_tab(pll__('Portfolio body'), array( 
            Field::make('text', 'portfolio_body_title', pll__('Portfolio body title')),
            Field::make('textarea', 'portfolio_body_excerpt', pll__('Portfolio body excerpt')),
            Field::make('textarea', 'portfolio_body_desc', pll__('Portfolio body description')),
          ));

          Container::make( 'theme_options', pll__('Blog page') )
          ->set_page_parent($id)
          ->add_tab(pll__('Blog header', 'blog_header'), array( 
              Field::make('text', 'blog_header_title', pll__('Blog title')),
              Field::make('textarea', 'blog_header_desc', pll__('Blog description')),
           ) );
    Container::make( 'theme_options', pll__('Widgets') )
        ->set_page_parent($id)
        ->add_tab(pll__('Search widget'), array( 
            Field::make('checkbox', 'search_checkbox', pll__('Show search')),
            Field::make('text', 'search_widget_title', pll__('search widget title')),
         ) )
         ->add_tab(pll__('Text widget'), array( 
            Field::make('checkbox', 'text_widget_checkbox', pll__('Show widget')),
            Field::make('text', 'text_widget_title', pll__('Widget title')),
            Field::make('textarea', 'textarea_text_widget', pll__('Widget description')),
          ));

    Container::make( 'theme_options', pll__('About page') )
        ->set_page_parent($id)
        ->add_tab(pll__('About header', 'about_header'), array( 
            Field::make('text', 'about_header_title', pll__('About title')),
            Field::make('textarea', 'about_header_desc', pll__('About description')),
         ) )
         ->add_tab( pll__('About page body',), array( 
            Field::make('text', 'about_body_title', pll__('About body title')),
            Field::make('textarea', 'about_body_excerpt', pll__('About body excerpt')),
            Field::make('textarea', 'about_body_desc', pll__('About body description')),
          ) );

    Container::make( 'theme_options', pll__('Contact page') )
        ->set_page_parent($id)
        ->add_tab(pll__('Contact header', 'contact_header'), array( 
            Field::make('text', 'contact_header_title', pll__('Contact title')),
            Field::make('textarea', 'contact_header_desc', pll__('Contact description')),
         ) )
         ->add_tab( pll__('Contact page body'), array( 
            Field::make('text', 'contact_body_title', pll__('contact body title')),
            Field::make('textarea', 'contact_body_excerpt', pll__('contact body excerpt')),
            Field::make('textarea', 'contact_body_desc', pll__('contact body description')),
          ) );

    Container::make('post_meta', pll__('Client'))
        ->where('post_type', '=', 'portfolio_projects')
        ->add_fields( array( 
            Field::make('text', 'project_client', pll__('Project client')),
            Field::make('text', 'project_link', pll__('Project link')),
         ) );

    Container::make('user_meta', pll__('Company role'))
        ->add_fields( array( 
            Field::make('image', 'worker_photo', pll__('Worker photo')),
            Field::make('text', 'company_role', pll__('Company role')),
            Field::make('complex', 'user_socials', pll__('User socials'))
                ->add_fields( array( 
                    Field::make('text', 'link', pll__('User link')),
                    Field::make('select', 'select', pll__('Select social'))
                        ->add_options( array( 
                            'fa-facebook'    => 'facebook',
                            'fa-twitter'     => 'twitter',
                            'fa-google-plus' => 'google plus',
                            'fa-linkedin'    => 'linkedin',
                            'fa-skype'       => 'skype',
                            'fa-rss'         => 'rss',
                         ) ),
                ) ),
         ) );

});