<h2><%= l(:label_spent_time) %></h2>

<% labelled_tabular_form_for :time_entry, @time_entry, :url => {:action => 'edit', :project_id => @time_entry.project} do |f| %>
<%= error_messages_for 'time_entry' %>
<%= back_url_hidden_field_tag %>

<div class="box">
<p><%= f.text_field :issue_id, :size => 6 %> <em><%= h("#{@time_entry.issue.tracker.name} ##{@time_entry.issue.id}: #{@time_entry.issue.subject}") if @time_entry.issue %></em></p>
<p><%= f.text_field :spent_on, :size => 10, :required => true %><%= calendar_for('time_entry_spent_on') %></p>
<p><%= f.text_field :hours, :size => 6, :required => true %></p>
<p><%= f.text_field :comments, :size => 100 %></p>
<p><%= f.select :activity_id, activity_collection_for_select_options, :required => true %></p>
<% @time_entry.custom_field_values.each do |value| %>
	<p><%= custom_field_tag_with_label :time_entry, value %></p>
<% end %>
<%= call_hook(:view_timelog_edit_form_bottom, { :time_entry => @time_entry, :form => f }) %>
</div>

<%= submit_tag l(:button_save) %>

<% end %>
