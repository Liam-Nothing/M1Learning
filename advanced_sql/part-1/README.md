### Exercise 1 :

- 1.
        
    ```sql
    USE bankDB;

    CREATE TABLE ensembl (
        ensemblGID VARCHAR(50) PRIMARY KEY,
        description TEXT
    );

    CREATE TABLE clone (
        cloneID VARCHAR(50) PRIMARY KEY,
        details TEXT
    );

    CREATE TABLE bank (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ensemblGID VARCHAR(50),
        cloneID VARCHAR(50),
        bank VARCHAR(10),
        plate VARCHAR(10),
        position VARCHAR(10),
        FOREIGN KEY (ensemblGID) REFERENCES ensembl(ensemblGID),
        FOREIGN KEY (cloneID) REFERENCES clone(cloneID)
    );

    INSERT INTO ensembl (ensemblGID, description) VALUES
    ('ENSMUSG038580', 'Sample Description 1'),
    ('ENSMUSG023353', 'Sample Description 2'),
    ('ENSMUSG022811', 'Sample Description 3'),
    ('ENSMUSG017335', 'Sample Description 4');

    INSERT INTO clone (cloneID, details) VALUES
    ('H3001A02', 'Clone Details 1'),
    ('H3001H05', 'Clone Details 2'),
    ('H3002B09', 'Clone Details 3'),
    ('634636', 'Clone Details 4'),
    ('572816', 'Clone Details 5'),
    ('H3002A01', 'Clone Details 6');

    INSERT INTO bank (ensemblGID, cloneID, bank, plate, position) VALUES
    ('ENSMUSG038580', 'H3001A02', 'FM', '001', 'A02'),
    ('ENSMUSG038580', 'H3001H05', 'FM', '003', 'D01'),
    ('ENSMUSG023353', 'H3002B09', 'FM', '001', 'D01'),
    ('ENSMUSG023353', '634636', 'MLN', '1553', 'A05'),
    ('ENSMUSG022811', '572816', 'MTB', 'LLAM1382', 'A09'),
    ('ENSMUSG017335', 'H3002A01', 'FM', '001', 'B05');
    ```

- 2

    