import sys
from pypdf import PdfReader, PdfWriter

if len(sys.argv) != 4:
    print("Usage: lock.py input.pdf password output.pdf")
    sys.exit(1)

input_pdf = sys.argv[1]
password = sys.argv[2]
output_pdf = sys.argv[3]

try:
    reader = PdfReader(input_pdf)
    writer = PdfWriter()
    for page in reader.pages:
        writer.add_page(page)
    # Zamkni PDF heslom (password pre owner aj user)
    writer.encrypt(password)
    writer.write(output_pdf)
except Exception as e:
    print(f"Error: {e}")
    sys.exit(1)
