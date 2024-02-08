<?php
class View {

    public function newPage() {
        echo '<form>
                  <div class="form-group">
                      <label for="etunimi">Etunimi</label>
                      <input type="text" class="form-control" id="etunimi" name="etunimi" required>
                  </div>
                  <div class="form-group">
                      <label for="sukunimi">Sukunimi</label>
                      <input type="text" class="form-control" id="sukunimi" name="sukunimi" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Tallenna</button>
              </form>';
    }

    public function showAll($kayttaja) {
        echo '<a href="#">Lisää uusi</a>
              <table class="table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Etunimi</th>
                          <th>Sukunimi</th>
                          <th>Muokkaa</th>
                          <th>Poista</th>
                      </tr>
                  </thead>
                  <tbody>';
    
        foreach ($kayttaja as $kayttaja) {
            echo '<tr>
                      <td>' . $kayttaja->getKayttajaId() . '</td>
                      <td>' . $kayttaja->getEtunimi() . '</td>
                      <td>' . $kayttaja->getSukunimi() . '</td>
                      <td><a href="?action=edit&id=' . $kayttaja->getKayttajaId() . '">Muokkaa</a></td>
                      <td><a href="?action=delete&id=' . $kayttaja->getKayttajaId() . '">Poista</a></td>
                  </tr>';
        }
    
        echo '</tbody>
              </table>';
    }
    

    public function editPage($kayttaja) {
        echo '<form>
                  <div class="form-group">
                      <label for="etunimi">Etunimi</label>
                      <input type="text" class="form-control" id="etunimi" name="etunimi" value="' . $kayttaja->getEtunimi() . '" required>
                  </div>
                  <div class="form-group">
                      <label for="sukunimi">Sukunimi</label>
                      <input type="text" class="form-control" id="sukunimi" name="sukunimi" value="' . $kayttaja->getSukunimi() . '" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Päivitä</button>
              </form>';
    }
}
?>
