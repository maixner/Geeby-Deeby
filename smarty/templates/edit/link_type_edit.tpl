<div id="editForm">
  <input type="hidden" id="Link_Type_ID" value="{$linkType.Link_Type_ID|escape}" />
  <table class="edit">
    <tr>
      <th>Link Type:</th>
      <td><input type="text" id="Link_Type" value="{$linkType.Link_Type|escape}" /></td>
    </tr>
  </table>
  <button id="save_link_type" onclick="saveLinkType();">Save</button>
  <div id="save_link_type_status"></div>
</div>
