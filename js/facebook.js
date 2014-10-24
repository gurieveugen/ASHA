function Facebook(options){
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	this.options      = options;
	this.url_user     = '';
	this.user_picture = '';
	var $this         = this;
	
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
		                                             
	/**
	 * Get all items
	 */
	this.getItems = function(){
		var args = {
			access_token: options.app_id + '|' + options.app_key,
			fields: 'type,link,picture,from,message,created_time,comments.limit(1).summary(true),likes.limit(1).summary(true),shares',
			limit: options.count
		};
		var url = String.Format(
			'https://graph.facebook.com/v2.1/{0}/posts?{1}',
			options.page,
			jQuery.param(args)
		);
		
		this.setUserPicture();
		this.load(url);
	};

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	this.load = function(url){
		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: url,
			success: function(response){
				if(typeof(response.data) != 'undefined')
				{
					var elements = [];
					for(var i = 0; i < response.data.length; i++)
					{
						elements.push( $this.wrapItem( response.data[i] ) );
					}
					jQuery('.facebook-post').hide();
					jQuery('.facebook-post').html(elements.join(' '));
					jQuery('.facebook-post').fadeIn();
				}
			}
		});
	};

	/**
	 * Wrap one item to HTML code
	 * @param  object item --- facebook object
	 * @return string --- HTML code
	 */
	this.wrapItem = function(el){
		var item = [];
		var ids = el.id.split('_');
		el.link = 'https://www.facebook.com/permalink.php?story_fbid=' + ids[1] + '&id=' + ids[0];
		
		item.push('<li class="cf">');
		item.push(
			String.Format(
				'<figure><img src="{0}" alt="Avatar"></figure>',
				this.user_picture
			)
		);
		item.push('<div class="txt">');
		item.push(
			String.Format(
				'<p>{0}</p>',
				this.getText(el)
			)
		);
		item.push(this.wrapInfoPanel(el));
		item.push('</div>');
		item.push('</li>');
		
		return item.join('');
	};	

	this.wrapInfoPanel = function(el){
		var d = new Date();
		var panel = [];
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var link = String.Format(
			'https://facebook.com/{0}', 
			this.options.page
		);
		var share = String.Format(
			'http://www.facebook.com/sharer.php?u={0}',
			el.link
		);

		if(typeof(el.likes) == 'undefined')
		{
			el.likes = {summary:{total_count : 0}};
		}

		d.setTime(Date.parse(el.created_time));

		panel.push('<div class="meta">');
		panel.push('<ol>');
		panel.push('<li>');
		panel.push(
			String.Format(
				'<a href="{1}" class="number-like">{0}</a>',
				el.likes.summary.total_count,
				el.link
			)
		);
		panel.push(
			String.Format(
				'<a href="{0}">Like</a>',
				el.link
			)
		);
		panel.push('</li>');
		panel.push(
			String.Format(
				'<li><a href="{0}">Reply</a></li>',
				share
			)
		);
		panel.push(
			String.Format(
				'<li><a href="{0}">Subscribe</a></li>',
				link
			)
		);
		panel.push(
			String.Format(
				'<li>{0} {1} at {2}:{3}</li>',
				months[d.getMonth()],
				d.getDate(),
				d.getHours(),
				d.getMinutes()
			)
		);
		panel.push('</ol>');
		panel.push('</div>');

		return panel.join('');
	}

	/**
	 * Get user picture
	 * @return string --- image src
	 */
	this.setUserPicture = function(){
		var args = {
			access_token: this.options.app_id + '|' + this.options.app_key,
			fields: 'url',
			redirect: 'false'
		};
		this.url_user = String.Format(
			'https://graph.facebook.com/v2.1/{0}/picture?{1}',
			this.options.page,
			jQuery.param(args)
		);

		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: this.url_user,
			data: this.options.page,
			success: function(response){
				if(typeof(response.data.url) != 'undefined')
				{
					$this.user_picture = response.data.url;
				}
			}
		});
	};

	/**
	 * Get text from facebook element
	 * @param  object el --- facebook element
	 * @return string --- text
	 */
	this.getText = function(el){
		var str = '';
		if(typeof(el.story) != 'undefined') str += el.story;
		if(typeof(el.message) != 'undefined') str += el.message;
		return str;
	};

	/**
	 * Get image from source
	 * @return string --- image url
	 */
	this.getImage = function(src){
		return src.replace('/v/', '/').replace('/s130x130/', '/s/');
	};
}



